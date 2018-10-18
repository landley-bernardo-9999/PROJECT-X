<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Resident;
use App\Room;
use App\Violation;  
use DB;
use Carbon\Carbon;

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
    public function index()
    {
        $rowNum = 1;
        $residents = DB::table('residents')->orderBy('name', 'asc')->get();
        $harvard = DB::table('residents')
            ->join('rooms', 'residents.roomNo', '=', 'rooms.roomNo')
            ->select('residents.*')
            ->where('rooms.building','=','Harvard')
            ->get();
        $princeton = DB::table('residents')
            ->join('rooms', 'residents.roomNo', '=', 'rooms.roomNo')
            ->select('residents.*')
            ->where('rooms.building','=','Princeton')
            ->get();
        $wharton = DB::table('residents')
            ->join('rooms', 'residents.roomNo', '=', 'rooms.roomNo')
            ->select('residents.*')
            ->where('rooms.building','=','Wharton')
            ->get();
        $courtyard = DB::table('residents')
            ->join('rooms', 'residents.roomNo', '=', 'rooms.roomNo')
            ->select('residents.*')
            ->where('rooms.building','=','Courtyard')
            ->get();
        
        return view('residents.index')->with('residents', $residents)
                                       ->with('rowNum', $rowNum)
                                       ->with('harvard', $harvard)
                                       ->with('princeton', $princeton)
                                       ->with('wharton', $wharton)
                                       ->with('courtyard', $courtyard);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$registeredRooms = DB::table('rooms')->get();

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        //return $registeredRooms;
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
            'roomNo' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'nullable',
            'emailAddress' => 'nullable',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable',
            'cover_image' => 'image|nullable|max:1999',
            'reasonForMovingOut' => 'nullable',
            'securityDeposit' => 'required',
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
        $resident->roomNo = $request->input('roomNo');
        $resident->birthDate = $request->input('birthDate');
        $resident->residentStatus = $request->input('residentStatus');
        $resident->school = $request->input('school');
        $resident->course =$request->input('course');
        $resident->yearLevel = $request->input('yearLevel');
        $resident->mobileNumber = $request->input('mobileNumber');
        $resident->emailAddress = $request->input('emailAddress');
        $resident->moveInDate = $request->input('moveInDate');
        $resident->moveOutDate = $request->input('moveOutDate');
        $resident->cover_image = $fileNameToStore;
        $resident->reasonForMovingOut = $request->input('reasonForMovingOut');
        $resident->securityDeposit = $request->input('securityDeposit');

        $resident->save();


        return redirect('/residents/'.$resident->id)->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rowNoForConcerns = 1;
        $rowNoForViolations = 1;
        $resident = Resident::find($id);
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

        

        return view('residents.show')->with('rowNoForConcerns', $rowNoForConcerns)
                                     ->with('rowNoForViolations', $rowNoForViolations)
                                     ->with('resident',$resident)
                                     ->with('repair', $repair)
                                     ->with('violation', $violation);
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
            'roomNo' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'nullable',
            'emailAddress' => 'nullable',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable',
            'cover_image' => 'image|nullable|max:1999',
            'reasonForMovingOut' => 'nullable',
            'securityDeposit' => 'required',
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
        $resident->roomNo = $request->input('roomNo');
        $resident->birthDate = $request->input('birthDate');
        $resident->residentStatus = $request->input('residentStatus');
        $resident->school = $request->input('school');
        $resident->course =$request->input('course');
        $resident->yearLevel = $request->input('yearLevel');
        $resident->mobileNumber = $request->input('mobileNumber');
        $resident->emailAddress = $request->input('emailAddress');
        $resident->moveInDate = $request->input('moveInDate');
        $resident->moveOutDate = $request->input('moveOutDate');
        $resident->reasonForMovingOut = $request->input('reasonForMovingOut');
        $resident->securityDeposit = $request->input('securityDeposit');
        if($request->hasFile('cover_image')){
        $resident->cover_image = $fileNameToStore;
        }
        $resident->save();
        return redirect('/residents/'.$resident->id)->with('success', 'Updated successfully!');

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
        return redirect('/residents')->with('success','Deleted successfully!');
    }
}
