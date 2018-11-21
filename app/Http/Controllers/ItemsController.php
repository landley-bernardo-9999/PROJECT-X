<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;

class ItemsController extends Controller
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
        $rowNum = 1;
        $itemRow = 1;

        $s = $request->query('s');
        $items = DB::table('items')
        ->where('items.item', 'like', "%$s%")
        ->orWhere('items.desc', 'like', "%$s%")
        ->orWhere('items.brand', 'like', "%$s%")
        ->orderBy('updated_at', 'desc')
        ->get();

        $outOfStack = DB::table('items')
        ->where('quan', '<=', "0")
        ->orWhere('quan', 'IS NULL')
        ->get();

        return view('inventorymgmt.items.index')
        ->with('outOfStack', $outOfStack)
        ->with('items', $items)->with('rowNum', $rowNum)->with('itemRow', $itemRow)->with('s', $s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;

        $item->item = $request->input('item');
        $item->desc = $request->input('desc');
        $item->brand = $request->input('brand');
        $item->quan = $request->input('quan');
        $item->unit = $request->input('unit');
        $item->remarks = $request->input('remarks');
    
        $item->save();

        return redirect('/inventorymgmt/items/')->with('success',$item->item, 'Added successfully!');
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
        $item = Item::find($id);

        $item->item = $request->input('item');
        $item->desc = $request->input('desc');
        $item->brand = $request->input('brand');
        $item->quan = $request->input('quan');
        $item->unit = $request->input('unit');
        $item->remarks = $request->input('remarks');
    
        $item->save();

        return redirect('/inventorymgmt/items/')->with('success','Updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/inventorymgmt/items/')->with('success','Deleted successfully!');
    }
}
