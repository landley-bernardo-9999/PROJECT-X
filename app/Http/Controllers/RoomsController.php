<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Room;
use App\Resident;
use App\Owner;
use App\Repair;
use DB;

class RoomsController extends Controller
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
        $rooms = DB::table('rooms')->get();
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'building' => 'required',
            'rentalFee' => 'required',
            'roomStatus' => 'required',
            'size' => 'required',
            'capacity' => 'required',
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
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $room = new Room;
        $room->roomNo = $request->input('roomNo'); 
        $room->building = $request->input('building');
        $room->rentalFee = $request->input('rentalFee');
        $room->roomStatus = $request->input('roomStatus');
        $room->size = $request->input('size');
        $room->capacity=$request->input('capacity');    
        $room->cover_image = $fileNameToStore; 

        $room->save();

        return redirect('/rooms/'.$room->roomNo)->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function show($roomNo)
    {
        $room = Room::find($roomNo);
        $resident = Resident::where('roomNo', '=', '101');
        $owner = Owner::all();
        $repair = Repair::all();

        return view('rooms.show')->with('room', $room)->with('resident' , $resident)->with('repair', $repair)->with('owner', $owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function edit($roomNo)
    {
        $room = Room::find ($roomNo);
        return view('rooms.edit')->with('room',$room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $roomNo)
    {
        $this->validate($request,[
            'roomNo' => 'required',
            'building' => 'required',
            'rentalFee' => 'required',
            'roomStatus' => 'required',
            'size' => 'required',
            'capacity' => 'required',
           
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
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
         
        //Add Room
        $room = Room::find($roomNo);
        $room->roomNo = $request->input('roomNo');
        $room->building = $request->input('building');
        $room->rentalFee = $request->input('rentalFee');
        $room->roomStatus = $request->input('roomStatus');
        $room->size = $request->input('size');
        $room->capacity = $request->input('capacity');  
        if($request->hasFile('cover_image')){
            $room->cover_image = $fileNameToStore;
        }  
      
    
        $room->save();

        return redirect('/rooms/'.$room->roomNo)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function destroy($roomNo)
    {
        $room = Room::find($roomNo);

        if($room->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$room->cover_image);
        }

        $room->delete();
        return redirect('/rooms')->with('success','Room','Deleted successfully!');
    }
}


