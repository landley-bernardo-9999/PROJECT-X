<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Owner;
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
    public function index()
    {
        $owners = DB::table('owners')->get();
        return view('owners.index')->with('owners', $owners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
            'birthDate' => 'nullable',
            'mobileNumber' => 'nullable',
            'emailAddress' => 'nullable',
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
        $owner->roomNo = $request->input('roomNo');
        $owner->birthDate = $request->input('birthDate');
        $owner->mobileNumber = $request->input('mobileNumber');
        $owner->emailAddress = $request->input('emailAddress');   
        $owner->cover_image = $fileNameToStore; 

        $owner->save();

        return redirect('/owners/'.$owner->id)->with('success','Added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::find($id);
        return view('owners.show', array('owner' => $owner));
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
        return view('owners.edit')->with('owner',$owners);
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
        $owner->roomNo = $request->input('roomNo');
        $owner->birthDate = $request->input('birthDate');
        $owner->mobileNumber = $request->input('mobileNumber');
        $owner->emailAddress = $request->input('emailAddress');   
        if($request->hasFile('cover_image')){
        $owner->cover_image = $fileNameToStore;
        }

        $owner->save();

        return redirect('/owners/'.$owner->id)->with('success','Updated successfully!');
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
        return redirect('/owners')->with('success','Deleted successfully!');
    }
}
