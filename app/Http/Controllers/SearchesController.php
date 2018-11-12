<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\Residents;
use App\Contracts;
use App\Owners;
use App\Transactions;
use App\Rooms;


class SearchesController extends Controller
{
    public function residents( Request $request ) {
	   $s = $request->query('s');
        $rowNum = 1;

        $residents = DB::table('residents')
        ->join('contracts', 'residents.id', '=', 'contracts.residentName')
        ->select('residents.*', 'residents.id as residentId','contracts.*')
         ->where('residents.name', 'like', "%$s%")
         ->orWhere('contracts.residentRoomNo', 'like', "%$s%")
         ->orWhere('residents.emailAddress', 'like', "%$s%")
         ->orWhere('residents.mobileNumber', 'like', "%$s%")
         ->orWhere('residents.residentStatus', 'like', "%$s%")
         ->orWhere('contracts.moveOutDate', 'like', "%$s%")
         ->orWhere('contracts.term', 'like', "%$s%")
        ->get();

        $active = DB::table('residents')->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])->get();

        $harvard = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*', 'residents.*', 'contracts.*')
             ->where('rooms.building','=','Harvard')
             ->whereIn('residents.residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $princeton = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Princeton')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $wharton = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Wharton')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        $courtyard = DB::table('rooms')
             ->join('contracts', 'rooms.roomNo', '=', 'contracts.residentRoomNo')
             ->join('residents', 'residents.id', '=', 'contracts.residentName')
             ->select('rooms.*')
             ->where('rooms.building','=','Courtyard')
             ->whereIn('residentStatus', ['Active', 'Moving-in', 'Moving-out', 'Extended'])
             ->get();

        return view('residents.index', [
                                             'residents' => $residents, 
                                             's' => $s,
                                             'rowNum' => $rowNum,
                                             'active' => $active,
                                             'harvard' => $harvard,
                                             'princeton' => $princeton,
                                             'wharton' => $wharton,
                                             'courtyard' => $courtyard,
                                        ]);
    }
    
    public function rooms( Request $request ) {
          //
     }

}
