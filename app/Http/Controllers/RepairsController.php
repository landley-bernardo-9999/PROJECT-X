<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repair;
use App\Room;
use DB;
use App\Maintenances;

class RepairsController extends Controller
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

        
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('rooms.*')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('residents.*')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();


        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);
        
        $rowNum = 1;
        $repairs = DB::table('repairs')
        ->join('maintenances', 'repairs.endorsedTo', '=', 'maintenances.name')
            
        ->select('repairs.*','repairs.id as repairsId', 'maintenances.*', 'repairs.name as residentName')
        ->whereIn('repairs.repairStatus', ['pending', 'ongoing'])
        ->orderBy('repairs.created_at','desc')
        ->get();

        $registeredPersonnels = DB::table('maintenances')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $pending = DB::table('repairs')->where('repairStatus', 'pending')->get();
        $ongoing = DB::table('repairs')->where('repairStatus', 'ongoing')->get();
        $closed = DB::table('repairs')->where('repairStatus', 'closed' ) ->get();
        return view('repairs.index')->with('repairs', $repairs)
                                    ->with('rowNum', $rowNum)
                                    ->with('pending', $pending)
                                    ->with('ongoing', $ongoing)
                                    ->with('closed', $closed)
                                    ->with('registeredRooms', $registeredRooms)
                                    ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners)
                                    ->with('registeredPersonnels', $registeredPersonnels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);
        
        $registeredPersonnels = DB::table('maintenances')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        return view('repairs.create')->with('registeredRooms', $registeredRooms)
                                     ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners)
                                     ->with('registeredPersonnels', $registeredPersonnels);
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
            'roomNo' => 'required',
            'name' => 'nullable',
            'dateReported' => 'required',
            'desc' => 'required',
            'endorsedTo' => 'required',
            'cost' => 'required',
            'repairStatus' => 'required',
            'dateFinished' => 'nullable',
            'cover_image' => 'image|nullable|max:1999'
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
        $repair = new Repair;

        $repair->roomNo = $request->input('roomNo');
        $repair->name = $request->input('name');
        $repair->dateReported = $request->input('dateReported');
        $repair->desc = $request->input('desc');
        $repair->endorsedTo = $request->input('endorsedTo');
        $repair->cost = $request->input('cost');
        $repair->repairStatus = $request->input('repairStatus');
        $repair->dateFinished = $request->input('dateFinished');
     
        $repair->cover_image = $fileNameToStore; 

        $repair->save();

        return redirect('/propertymgmt/repairs/'.$repair->id)->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repair = Repair::find($id);

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get(); 

        $registeredPersonnels = DB::table('maintenances')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        return view('repairs.show')->with('repair', $repair)
                                   ->with('registeredRooms', $registeredRooms)
                                   ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners)
                                   ->with('registeredPersonnels', $registeredPersonnels);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairs = Repair::find ($id);
        
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);
        
        $registeredPersonnels = DB::table('maintenances')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();



        return view('repairs.edit')->with('repair',$repairs)
                                   ->with('registeredRooms', $registeredRooms)
                                   ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners)
                                     ->with('registeredPersonnels', $registeredPersonnels);
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
            'roomNo' => 'required',
            'name' => 'nullable',
            'dateReported' => 'required',
            'desc' => 'required',
            'endorsedTo' => 'required',
            'cost' => 'required',
            'repairStatus' => 'required',
            'dateFinished' => 'nullable',
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
            $path = $request->file('cover_image')->storeAs('public/repair_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Add Repair
        $repair = Repair::find($id);
        $repair->roomNo = $request->input('roomNo');
        $repair->name = $request->input('name');
        $repair->dateReported = $request->input('dateReported');
        $repair->desc = $request->input('desc');
        $repair->endorsedTo = $request->input('endorsedTo');
        $repair->cost = $request->input('cost');
        $repair->repairStatus = $request->input('repairStatus');
        $repair->dateFinished = $request->input('dateFinished');
     
        if($request->hasFile('cover_image')){
            $repair->cover_image = $fileNameToStore;
            }

        $repair->save();

        return redirect('/propertymgmt/repairs/'.$repair->id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repair = Repair::find($id);

        if($repair->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/repair_images/'.$repair->cover_image);
        }

        $repair->delete();
        return redirect('/propertymgmt/repairs')->with('success','Deleted successfully!');
    }
}
