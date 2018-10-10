<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Resident;
use App\Room;
use DB;

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
        $residents = DB::table('residents')->get();
        return view('residents.index')->with('residents', $residents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
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
            'birthDate' => 'required',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'required|unique:residents',
            'emailAddress' => 'required|unique:residents',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable',
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

        $resident->save();


        return redirect('/residents/'.$resident->id)->with('success',''.'Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::find($id);
        return view('residents.show')->with('resident',$resident);
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
        return view('residents.edit')->with('resident',$residents);
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
            'birthDate' => 'required',
            'residentStatus' => 'required',
            'school' => 'nullable',
            'course' => 'nullable',
            'yearLevel' => 'nullable',
            'mobileNumber' => 'required',
            'emailAddress' => 'required',
            'moveInDate' => 'nullable',
            'moveOutDate' => 'nullable'
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
        if($request->hasFile('cover_image')){
        $resident->cover_image = $fileNameToStore;
        }

        $resident->save();

        return redirect('/residents/'.$resident->id)->with('success',' '.'Updated successfully!');

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
            //Delete the image
            Storage::delete('public/resident_images/'.$resident->cover_image);
        }

        $resident->delete();
        return redirect('/residents')->with('success','  '.'Deleted successfully!');
    }
}
