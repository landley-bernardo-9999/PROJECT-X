<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Residents;
use App\Contracts;

class SearchController extends Controller
{
    function index(){
        return view('search');
    }

    function action(Request $request){
        if($request->ajax())
        {
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('residents')
                ->join('contracts', 'residents.id', '=', 'contracts.residentName')
                ->select('residents.*', 'residents.id as residentId','contracts.*')
                ->orderBy('contracts.moveOutDate','asc')
                ->where('residents.name','LIKE','%'.$query.'%')
                ->get();
            }
            else{
                $data = DB::table('residents')
                ->join('contracts', 'residents.id', '=', 'contracts.residentName')
                ->select('residents.*', 'residents.id as residentId','contracts.*')
                ->orderBy('contracts.moveOutDate','asc')
                ->get();
            }

            $total_row = $data->count();
            if($total_row > 0 ){
                foreach($data as $row){
                    $output ='
                             <tr>
                                <th scope="row">{{$rowNum++}}</th>
                                <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$row->cover_image}}" alt="Card image cap"></td>
                                <td><a href="/residents/{{$row->residentId}}">{{$row->name}}</a></td>
                                <td><a href="/rooms/{{$row->residentRoomNo}}">{{$row->residentRoomNo}}</a></td>
                                <td>{{$row->residentStatus}}</td>
                                <td>{{$row->mobileNumber}}</td>
                                <td>{{$row->emailAddress}}</td>
                                <td>{{$row->moveOutDate}}</td>
                             </tr>
                            ';
                }
            }
            else{
                $output = 
                    '
                        <tr>
                            <td class="text-center">No Residents found!</td>
                        </tr>
                    ';
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_data
            );

            echo json_encode($data);
        }
    }
}
