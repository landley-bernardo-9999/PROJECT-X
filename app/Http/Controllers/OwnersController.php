<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Owner;
use App\Room;
use DB;

class OwnersController extends Controller
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
        $owners = DB::table('owners')
        ->join('transactions', 'owners.id', '=', 'transactions.ownerName')
        ->select('owners.*', 'owners.id as ownerId','transactions.*')
        ->where('owners.name', 'like', "%$s%")
        ->orWhere('transactions.roomNo', 'like', "%$s%")
        ->orderBy('owners.name','asc')
        ->paginate(10);

        
        return view('owners.index')->with('owners', $owners)->with('rowNum', $rowNum);
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
        return view('owners.create')->with('registeredRooms', $registeredRooms);
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
            'name' => 'required|unique:owners',
            'birthDate' => 'nullable',
            'mobileNumber' => 'required|integer',
            'emailAddress' => 'required|max:20',
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
            $path = $request->file('cover_image')->storeAs('public/owner _images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $owner = new Owner;

        $owner->name = $request->input('name');
        $owner->birthDate = $request->input('birthDate');
        $owner->mobileNumber = $request->input('mobileNumber');
        $owner->emailAddress = $request->input('emailAddress');   
        $owner->cover_image = $fileNameToStore; 

        $owner->save();

        return redirect('/propertymgmt/owners/'.$owner->id)->with('success','Added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rowNoForTransactions = 1;
        $rowNoForConcerns = 1;
        $owner = Owner::find($id);

        $transaction = DB::table('transactions')
            ->join('owners', 'transactions.ownerName', '=', 'owners.id')
            ->select('transactions.*')
            ->where('owners.id','=',$id)
            ->get();

        $repair = DB::table('repairs')
            ->join('owners', 'repairs.name', '=', 'owners.name')
            ->select('repairs.*')
            ->where('owners.id','=',$id)
            ->get();
            
        return view('owners.show')->with('rowNoForTransactions', $rowNoForTransactions)
                                  ->with('rowNoForConcerns', $rowNoForConcerns)
                                  ->with('owner', $owner)
                                  ->with('repair', $repair)
                                  ->with('transaction', $transaction);
                                  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owners = Owner::find ($id);
        $registeredRooms = DB::table('rooms')
        ->orderBy('roomNo', 'asc')
        ->select('roomNo')
        ->get();
        return view('owners.edit')->with('owner',$owners)->with('registeredRooms', $registeredRooms);
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
            'mobileNumber' => 'nullable',
            'emailAddress' => 'nullable',
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
            $path = $request->file('cover_image')->storeAs('public/owner_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Owner
        $owner = Owner::find($id);
        $owner->name = $request->input('name');
        $owner->birthDate = $request->input('birthDate');
        $owner->mobileNumber = $request->input('mobileNumber');
        $owner->emailAddress = $request->input('emailAddress');   
        if($request->hasFile('cover_image')){
        $owner->cover_image = $fileNameToStore;
        }

        $owner->save();

        return redirect('/propertymgmt/owners/'.$owner->id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owner::find($id);

        if($owner->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/owner_images/'.$owner->cover_image);
        }

        $owner->delete();
        return redirect('/propertymgmt/owners')->with('success','Deleted successfully!');
    }
}
