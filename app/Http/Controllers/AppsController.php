<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Repair;
use DateTime;
use Carbon\Carbon;


class AppsController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function propertymgmt(){
        $rooms = DB::table('rooms')->get();
    
        return view('apps.propertymgmt', compact('rooms'));
  
    }

    public function financialmgmt(){
        return view('apps.financialmgmt');
    }

    public function ancillaryservicesmgmt(){
        return view('apps.ancillaryservicesmgmt');
    }

    public function dormhealthmgmt(){
        return view('apps.dormhealthmgmt');
    }

    public function inventorymgmt(){
        return view('apps.inventorymgmt');
    }

    public function reportsandstats(){

        $now = new DateTime();

        $repairs = DB::table('repairs')->get();
        $pending = DB::table('repairs')->where('repairStatus', 'pending')->get();
        $ongoing = DB::table('repairs')->where('repairStatus', 'ongoing')->get();
        $done = DB::table('repairs')->where('repairStatus', 'done' ) ->get();

        $plumbing = DB::table('repairs')->where('desc', 'plumbing' ) ->get();
        $carpentry = DB::table('repairs')->where('desc', 'carpentry' ) ->get();
        $electric = DB::table('repairs')->where('desc', 'electric' ) ->get();
        $tilling = DB::table('repairs')->where('desc', 'tilling' ) ->get();
        $replacement = DB::table('repairs')->where('desc', 'replacement' ) ->get();
        $renovation = DB::table('repairs')->where('desc', 'renovation' ) ->get();

        $armando = DB::table('repairs')->where('endorsedTo', 'Armando' ) ->get();
        $chris = DB::table('repairs')->where('endorsedTo', 'Chris' ) ->get();
        $old_jeff = DB::table('repairs')->where('endorsedTo', 'Old Jeff' ) ->get();
        $new_jeff = DB::table('repairs')->where('endorsedTo', 'New Jeff' ) ->get();
        $marlon = DB::table('repairs')->where('endorsedTo', 'marlon' ) ->get();
        $marquez = DB::table('repairs')->where('endorsedTo', 'marquez' ) ->get(); 


        return view('apps.reportsandstats')
                                   ->with('repairs', $repairs)
                                   ->with('pending', $pending)
                                   ->with('ongoing', $ongoing)
                                   ->with('done', $done)

                                   ->with('plumbing', $plumbing)
                                   ->with('carpentry', $carpentry)
                                   ->with('electric', $electric)
                                   ->with('tilling', $tilling)
                                   ->with('replacement', $replacement)
                                   ->with('renovation', $renovation)
                                   
                                   ->with('armando', $armando)
                                   ->with('chris', $chris)
                                   ->with('old_jeff', $old_jeff)
                                   ->with('new_jeff', $new_jeff)
                                   ->with('marlon', $marlon)
                                   ->with('marquez', $marquez)
                                   ;
    }
 
}
