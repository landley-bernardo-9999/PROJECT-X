<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Resident;
use App\Room;
use App\Owner;
use App\Transaction;

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
        ->orderBy('roomNo', 'created_at')
        ->select('rooms.*')
        // ->where('roomStatus','Vacant')
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
            'ownerName' => 'required',
            "roomNo" => 'required',
            'moveInDate' => 'nullable',
            'totalPrice' => 'nullable',
            'downPayment' => 'nullable',
            'downPaymentMonthlyAmortization' => 'nullable',
            'monthlyAmortization' => 'nullable',
            'formOfPayment' => 'nullable',
        ]);

        $transaction = new Transaction;

        $transaction->ownerName = $request->input('ownerName');
        $transaction->roomNo = $request->input('roomNo');
        $transaction->moveInDate = $request->input('moveInDate');
        $transaction->totalPrice = $request->input('totalPrice');
        $transaction->downPayment = $request->input('downPayment');
        $transaction->downPaymentMonthlyAmortization = $request->input('downPaymentMonthlyAmortization');
        $transaction->monthlyAmortization = $request->input('monthlyAmortization');
        $transaction->formOfPayment = $request->input('formOfPayment');
        
    
        $transaction->save();

        return redirect('/propertymgmt/transactions/create')->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transactions = Transaction::find($id);

        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('rooms.*')
        // ->where('roomStatus','Vacant')
        ->get();

        $registeredOwners = DB::table('owners')
        ->orderBy('name', 'asc')
        ->select('owners.*')
        ->get();



        return view ('transactions.edit')->with('transactions', $transactions)
                                         ->with('registeredRooms', $registeredRooms)
                                         ->with('registeredOwners', $registeredOwners);
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
            'ownerName' => 'required',
            "roomNo" => 'required',
            'moveInDate' => 'nullable',
            'totalPrice' => 'nullable',
            'downPayment' => 'nullable',
            'downPaymentMonthlyAmortization' => 'nullable',
            'monthlyAmortization' => 'nullable',
            'formOfPayment' => 'nullable',
        ]);

        $transaction = Transaction::find($id);

        $transaction->ownerName = $request->input('ownerName');
        $transaction->roomNo = $request->input('roomNo');
        $transaction->moveInDate = $request->input('moveInDate');
        $transaction->totalPrice = $request->input('totalPrice');
        $transaction->downPayment = $request->input('downPayment');
        $transaction->downPaymentMonthlyAmortization = $request->input('downPaymentMonthlyAmortization');
        $transaction->monthlyAmortization = $request->input('monthlyAmortization');
        $transaction->formOfPayment = $request->input('formOfPayment');
        
    
        $transaction->save();

        return redirect('/propertymgmt/transactions/'.$transaction->id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();
        return redirect('/propertymgmt/rooms')->with('success','Deleted successfully!');
    }
}
