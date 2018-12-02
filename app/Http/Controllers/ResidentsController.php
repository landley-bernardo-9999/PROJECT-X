<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Resident;
use App\Room;
use App\Violation; 
use App\CoTenants; 
use DB;
use Carbon\Carbon;
use App\Contract;

class ResidentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->query('s');
        $rowNum = 1;

        $residents = DB::table('residents')
        ->join('contracts', 'residents.id', '=', 'contracts.residentName')
        ->select('residents.*', 'residents.id as residentId','contracts.*')
         ->where('residents.name', 'like', "%$s%")
         ->orWhere('contracts.residentRoomNo', 'like', "%$s%")
         ->orWhere('residents.emailAddress', 'like', "%$s%")
         ->orWhere('residents.mobileNumber', 'like', "%$s%")
         ->orWhere('residents.residentStatus', 'like', "%$s%")
        //  ->orWhere('contracts.moveOutDate', 'like', "%$s%")
        //  ->orWhere('contracts.term', 'like', "%$s%")
        ->paginate(10);

        $active = DB::table('residents')->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])->get();

        $harvard = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*', 'residents.*', 'contracts.*')
             ->where('rooms.building','=','Harvard')
             ->whereIn('residents.residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $princeton = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Princeton')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $wharton = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Wharton')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $courtyard = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Courtyard')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        return view('residents.index', [
                                             'residents' => $residents, 
                                             's' => $s,
                                             'rowNum' => $rowNum,
                                             'active' => $active,
                                             'harvard' => $harvard,
                                             'princeton' => $princeton,
                                             'wharton' => $wharton,
                                             'courtyard' => $courtyard,
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        return view('residents.create')->with('registeredRooms', $registeredRooms);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'required',
            'emailAddress' => 'required|string|email|max:500|unique:residents',
            'cover_image' => 'image|nullable|max:1999',
        ]);

         //Handle File Upload
         if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.' '.time().' '.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/resident_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $resident = new Resident;

        $resident->name = $request->input('name');
        $resident->birthDate = $request->input('birthDate');
        $resident->residentStatus = $request->input('residentStatus');
        $resident->school = $request->input('school');
        $resident->course =$request->input('course');
        $resident->yearLevel = $request->input('yearLevel');
        $resident->mobileNumber = $request->input('mobileNumber');
        $resident->emailAddress = $request->input('emailAddress');
        $resident->cover_image = $fileNameToStore;

        $resident->save();


        return redirect('/propertymgmt/residents/')->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rowNoForContracts = 1;
        $rowNoForConcerns = 1;
        $rowNoForViolations = 1;
        $resident = Resident::find($id);
        $violation = Violation::find($id);

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $room = DB::table('contracts')
        ->select('residentRoomNo')
        ->where('residentName','=',$id)
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $contract = DB::table('contracts')
            ->join('residents', 'contracts.residentName', '=', 'residents.id')
            ->select('contracts.*', 'contracts.id as contractId','residents.*')
            ->where('residents.id','=',$id)
            ->get();

        $repair = DB::table('repairs')
            ->join('residents', 'repairs.name', '=', 'residents.name')
            ->select('repairs.*')
            ->where('residents.id','=',$id)
            ->get();

        $violation = DB::table('violations')
            ->join('residents', 'violations.name', '=', 'residents.name')
            ->select('violations.*')
            ->where('residents.id','=',$id)
            ->get();

        

        return view('residents.show')->with('rowNoForContracts', $rowNoForContracts)
                                     ->with('rowNoForConcerns', $rowNoForConcerns)
                                     ->with('rowNoForViolations', $rowNoForViolations)
                                     ->with('resident',$resident)
                                     ->with('repair', $repair)
                                     ->with('violation', $violation)
                                     ->with('contract', $contract)
                                      ->with('registeredRooms', $registeredRooms)
                                      ->with('registeredResidents', $registeredResidents)
                                      ->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residents = Resident::find ($id);
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();
        return view('residents.edit')->with('resident',$residents)->with('registeredRooms', $registeredRooms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'nullable',
            'emailAddress' => 'nullable',
            'cover_image' => 'image|nullable|max:1999',
        ]);

         //Handle File Upload
         if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.' '.time().' '.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/resident_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Resident
        $resident = Resident::find($id);
        $resident->name = $request->input('name');
        $resident->birthDate = $request->input('birthDate');
        $resident->residentStatus = $request->input('residentStatus');
        $resident->school = $request->input('school');
        $resident->course =$request->input('course');
        $resident->yearLevel = $request->input('yearLevel');
        $resident->mobileNumber = $request->input('mobileNumber');
        $resident->emailAddress = $request->input('emailAddress');
        if($request->hasFile('cover_image')){
        $resident->cover_image = $fileNameToStore;
        }
        $resident->save();
        return redirect('/propertymgmt/residents/'.$resident->id)->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resident = Resident::find($id);
        if($resident->cover_image != 'noimage.jpg'){
            Storage::delete('public/resident_images/'.$resident->cover_image);
        }
        $resident->delete();
        return redirect('/propertymgmt/residents')->with('success','Deleted successfully!');
    }
}
