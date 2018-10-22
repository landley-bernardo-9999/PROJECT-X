<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Resident;
use App\Room;
use App\Owner;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.index');
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
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('owners.*')
        ->get();

        return view ('transactions.create')->with('registeredRooms', $registeredRooms)
                                        ->with('registeredOwners', $registeredOwners);
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
            "roomNo" => 'required',
            'moveInDate' => 'nullable',
            'totalPrice' => 'nullable',
            'downPayment' => 'nullable',
            'downPaymentMonthlyAmortization' => 'nullable',
            'monthlyAmortization' => 'nullable',
            'formOfPayment' => 'nullable',
        ]);

        $transaction = new Transaction;

        $transaction->name = $request->input('name');
        $transaction->roomNo = $request->input('roomNo');
        $transaction->moveInDate = $request->input('moveInDate');
        $transaction->totalPrice = $request->input('totalPrice');
        $transaction->downPayment = $request->input('downPayment');
        $transaction->downPaymentMonthlyAmortization = $request->input('downPaymentMonthlyAmortization');
        $transaction->monthlyAmortization = $request->input('monthlyAmortization');
        $transaction->formOfPayment = $request->input('formOfPayment');
        
    
        $transaction->save();

        return redirect('/transactions/'.$transaction->id)->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
