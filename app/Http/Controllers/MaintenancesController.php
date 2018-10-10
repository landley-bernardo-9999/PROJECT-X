<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Maintenance;
use DB;

class MaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = DB::table('maintenances')->get();
        return view('maintenances.index')->with('maintenances', $maintenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
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
            'birthDate' => 'required',
            'employmentStatus' => 'required',
            'position' => 'required',
            'schedule' => 'required',
            'mobileNumber' => 'required',
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
            $path = $request->file('cover_image')->storeAs('public/maintenance_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $maintenance = new Maintenance;

        $maintenance->name = $request->input('name');
        $maintenance->birthDate = $request->input('birthDate');
        $maintenance->employmentStatus = $request->input('employmentStatus');
        $maintenance->position = $request->input('position');
        $maintenance->schedule = $request->input('schedule');
        $maintenance->mobileNumber = $request->input('mobileNumber');  
        $maintenance->cover_image = $fileNameToStore; 

        $maintenance->save();

        return redirect('/maintenances/'.$maintenance->id)->with('success','Added successfully!');

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenances = Maintenance::find($id);
        return view('maintenances.show', array('maintenances' => $maintenances));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance = Maintenance::find ($id);
        return view('maintenances.edit')->with('maintenance',$maintenance);
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
            'birthDate' => 'required',
            'employmentStatus' => 'required',
            'position' => 'required',
            'schedule' => 'required',
            'mobileNumber' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

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
            $path = $request->file('cover_image')->storeAs('public/maintenance_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $maintenance = Maintenance::find($id);
        
        $maintenance->name = $request->input('name');
        $maintenance->birthDate = $request->input('birthDate');
        $maintenance->employmentStatus = $request->input('employmentStatus');
        $maintenance->position = $request->input('position');
        $maintenance->schedule = $request->input('schedule');
        $maintenance->mobileNumber = $request->input('mobileNumber');  
        if($request->hasFile('cover_image')){
            $maintenance->cover_image = $fileNameToStore;
        }
        $maintenance->save();
        return redirect('/maintenances/'.$maintenance->id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);

        if($maintenance->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/maintenance_images/'.$maintenance->cover_image);
        }

        $maintenance->delete();
        return redirect('/maintenances')->with('success', 'Deleted successfully!');
    }
}
