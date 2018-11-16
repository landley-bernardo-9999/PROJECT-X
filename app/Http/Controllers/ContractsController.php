<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Resident;
use App\Contract;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('contracts.index'); 
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
        ->select('rooms.*')
        //  
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('residents.*')
        ->get();

        return view ('contracts.create')->with('registeredRooms', $registeredRooms)
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
            'residentRoomNo' => 'required',
            "term" => 'required',
            'residentName' => 'required',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable',
            'amountPaid' => 'required',
            'securityDeposit' => 'required',
            'reasonForMovingOut' => 'nullable',
        ]);

        $contract = new Contract;

        $contract->residentRoomNo = $request->input('residentRoomNo');
        $contract->term = $request->input('term');
        $contract->residentName = $request->input('residentName');
        $contract->moveInDate = $request->input('moveInDate');
        $contract->moveOutDate = $request->input('moveOutDate');
        $contract->amountPaid = $request->input('amountPaid');
        $contract->securityDeposit = $request->input('securityDeposit');
        $contract->reasonForMovingOut = $request->input('reasonForMovingOut');

        $contract->save();

        return redirect('/propertymgmt/rooms/'.$contract->residentRoomNo )->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractRow = 1;
        $contract = Contract::find($id);
        // $contract = DB::table('contracts')
        // ->join('residents', 'contracts.residentName', '=', 'residents.id')
        // ->select('contracts.*','residents.*')
        // ->where('contracts.id', '=', $id)
        // ->get();

        
            return view ('contracts.show')
            ->with('contractRow', $contractRow)
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
        $contract = Contract::find($id);

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();

        $registeredResidents = DB::table('residents')
        ->orderBy('name', 'asc')
        ->select('residents.*')
        ->get();

        return view ('contracts.edit')->with('contract', $contract)
                                      ->with('registeredRooms', $registeredRooms)
                                      ->with('registeredResidents', $registeredResidents);;
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
            'residentRoomNo' => 'required',
            'term' => 'required',
            'residentName' => 'required',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable',
            'amountPaid' => 'required',
            'securityDeposit' => 'required',
            'reasonForMovingOut' => 'nullable',
        ]);

        $contract = Contract::find($id);

        $contract->residentRoomNo = $request->input('residentRoomNo');
        $contract->term = $request->input('term');
        $contract->residentName = $request->input('residentName');
        $contract->moveInDate = $request->input('moveInDate');
        $contract->moveOutDate = $request->input('moveOutDate');
        $contract->amountPaid = $request->input('amountPaid');
        $contract->securityDeposit = $request->input('securityDeposit');
        $contract->reasonForMovingOut = $request->input('reasonForMovingOut');

        $contract->save();

        return redirect('/propertymgmt/contracts/'.$contract->id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);

        $contract->delete();
        return redirect('/propertymgmt/rooms')->with('success','Deleted successfully!');
    }
}
