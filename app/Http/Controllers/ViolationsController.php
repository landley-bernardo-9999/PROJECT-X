<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Violation;
use App\Resident;

class ViolationsController extends Controller
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
        $rowNo = 1;
        $violations = DB::table('violations')->get();

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name', 'id')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name', 'id')
        ->get();

        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);

        return view('violations.index')
                                ->with('rowNo', $rowNo)
                                ->with('violations', $violations)
                                ->with('registeredRooms', $registeredRooms)
                                ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners);

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
        ->select('name', 'id')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('name', 'id')
        ->get();

        $registeredResidentsAndOwners = $registeredResidents->merge($registeredOwners);

        return view('violations.create')->with('registeredRooms', $registeredRooms)
                                       ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners);
                                     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$resident_id = Resident::select('id')->where('name','=',$request->name)->get();
        
        $this->validate($request,[
             'dateReported' => 'nullable',
             'name' => 'required',
             'roomNo' => 'required',
             'description' => 'required',
             'details' => 'nullable',
             'dateCommitted' => 'nullable',
             'reportedBy' => 'required',
             'fine' => 'required',
             'actionTaken' => 'required',

         ]);


         $violation = new Violation;

         $violation->dateReported = $request->input('dateReported');
         $violation->name = $request->input('name');
         $violation->roomNo = $request->input('roomNo');
         $violation->description = $request->input('description');
         $violation->details = $request->input('details');
         $violation->dateCommitted = $request->input('dateCommitted');
         $violation->reportedBy = $request->input('reportedBy');
         $violation->fine = $request->input('fine');
         $violation->actionTaken = $request->input('actionTaken');
        
         $violation->save();

         return redirect('/propertymgmt/violations/'.$violation->id)->with('success', 'Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $violation = Violation::find($id);

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('name')
        ->get();

        return view('violations.show')->with('violation', $violation)
                                      ->with('registeredRooms', $registeredRooms)
                                      ->with('registeredResidents', $registeredResidents);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $violations = Violation::find ($id);

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
            

            return view('violations.edit')->with('violation', $violations)
                                        ->with('registeredRooms', $registeredRooms)
                                        ->with('registeredResidentsAndOwners', $registeredResidentsAndOwners);
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
            'dateReported' => 'nullable',
            'name' => 'required',
            'roomNo' => 'required',
            'description' => 'required',
            'details' => 'nullable',
            'dateCommitted' => 'nullable',
            'reportedBy' => 'required',
            'fine' => 'required',
            'actionTaken' => 'required',

        ]);


        $violation = Violation::find($id);

        $violation->dateReported = $request->input('dateReported');
        $violation->name = $request->input('name');
        $violation->roomNo = $request->input('roomNo');
        $violation->description = $request->input('description');
        $violation->details = $request->input('details');
        $violation->dateCommitted = $request->input('dateCommitted');
        $violation->reportedBy = $request->input('reportedBy');
        $violation->fine = $request->input('fine');
        $violation->actionTaken = $request->input('actionTaken');

        $violation->save();

        return redirect('/propertymgmt/violations/'.$violation->id)->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $violation = Violation::find($id);

        $violation->delete();
        return redirect('/propertymgmt/violations')->with('success','Deleted successfully!');
    }
}
