<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resident;
use App\Room;
use App\Violation;  
use App\CoTenant;
use DB;
use Carbon\Carbon;

class CoTenantsController extends Controller
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

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('residents.*')
        ->get();

        return view('coTenants.create')->with('registeredRooms', $registeredRooms)
        ->with('registeredResidents', $registeredResidents);
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
            'principalTenant' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' =>'nullable',
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
            $path = $request->file('cover_image')->storeAs('public/coTenant_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $coTenant = new CoTenant;

        $coTenant->name = $request->input('name');
        $coTenant->principalTenant = $request->input('principalTenant');
        $coTenant->birthDate = $request->input('birthDate');
        $coTenant->residentStatus = $request->input('residentStatus');
        $coTenant->school = $request->input('school');
        $coTenant->course =$request->input('course');
        $coTenant->yearLevel = $request->input('yearLevel');
        $coTenant->mobileNumber = $request->input('mobileNumber');
        $coTenant->emailAddress = $request->input('emailAddress');
        $coTenant->cover_image = $fileNameToStore;

        $coTenant->save();


        return redirect('/coTenants/create')->with('success','Added successfully!');
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

            return view('coTenants.show')->with('rowNoForContracts', $rowNoForContracts)
                                     ->with('rowNoForConcerns', $rowNoForConcerns)
                                     ->with('rowNoForViolations', $rowNoForViolations)
                                     ->with('resident',$resident)
                                     ->with('repair', $repair)
                                     ->with('violation', $violation)
                                     ->with('contract', $contract);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coTenant = CoTenant::find ($id);
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();
        return view('coTenant.edit')->with('coTenant',$coTenant)->with('registeredRooms', $registeredRooms);
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
            'principalTenant' => 'required',
            'birthDate' => 'nullable',
            'residentStatus' => 'required',
            'school' =>'nullable',
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


        //Add Room
        $coTenant = CoTenant::find($id);

        $coTenant->name = $request->input('name');
        $coTenant->principalTenant = $request->input('principalTenant');
        $coTenant->birthDate = $request->input('birthDate');
        $coTenant->residentStatus = $request->input('residentStatus');
        $coTenant->school = $request->input('school');
        $coTenant->course =$request->input('course');
        $coTenant->yearLevel = $request->input('yearLevel');
        $coTenant->mobileNumber = $request->input('mobileNumber');
        $coTenant->emailAddress = $request->input('emailAddress');
        if($request->hasFile('cover_image'))
        {
            $coTenant->cover_image = $fileNameToStore;
        }

        $coTenant->save();


        return redirect('/coTenants/'.$coTenant->id)->with('success','Edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coTenant = CoTenant::find($id);
        if($coTenant->cover_image != 'noimage.jpg'){
            Storage::delete('public/coTenant_images/'.$coTenant->cover_image);
        }
        $coTenant->delete();
        return redirect('/residents')->with('success','Deleted successfully!');
    }
}
