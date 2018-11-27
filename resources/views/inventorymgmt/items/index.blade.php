@extends('layouts.app')
@section('content')
    
        <a class="btn btn-dark float-left" role="button" href="/home"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>       
        <a class="btn btn-warning add-room float-left" role="button" href="#" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD</a>
    
        &nbsp
        <form action="/search/items" method="GET">
            <input class =" form-control float-right" style="width:200px" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search items" /> 
        </form>   

        <div class=" dropright">
            <button type="button" class="btn btn-primary dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Out of Stack Supplies&nbsp<span class="badge badge-light">{{count($outOfStack)}}</span>
                    </button>
                        <div class="dropdown-menu">
                            @foreach($items as $row)
                                @if($row->quan==0)
                                    <ol class="list-group">
                                        <li class="list-group-item">
                                            {{$itemRow++}}.
                                                {{$row->item}}&nbsp{{$row->desc}}
                                        </li>
                                    </ol>
                                @endif
                            @endforeach
                        </div>
        </div>  
    
                    
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark ">
                        <tr>
                            <th>#</th>
                            <th  style="width: 250px;">Item</th>
                            <th style="width: 250px;">Description</th>
                            <th style="width: 130px;">Brand</th>
                            <th style="width: 90px;">Qty</th>
                            <th style="width: 80px;">Unit</th>
                            <th style="width: 200px;">Remarks</th>
                            <th colspan="2" style="text-align:center">Action</th>
                        </tr>
                    </thead>   
                <tbody>
                        @foreach($items as $row)
                        {!! Form::open(['action'=>['ItemsController@update', $row->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <tr>
                        <th>
                            <label for="name">{{$rowNum++}}</label>
                        </th>
                        <td>
                            {{Form::text('item',$row->item,['class'=>'form-control'])}}  
                        </td>
                        <td>
                            {{Form::text('desc',$row->desc,['class'=>'form-control'])}}
                        </td>

                        <td>
                            {{Form::text('brand',$row->brand,['class'=>'form-control'])}}
                        </td>
                            @if($row->quan==0)
                                <td style="width: 90px;">
                                    {{Form::number('quan',$row->quan,['class'=>'form-control btn-danger', 'min'=>'0'])}}
                                </td>
                            @else
                                <td style="width: 90px;">
                                    {{Form::number('quan',$row->quan,['class'=>'form-control','min'=>'0'])}}
                                </td>
                            @endif
                        <td style="width: 80px;">
                            {{Form::text('unit',$row->unit,['class'=>'form-control'])}}                     
                        </td>
                        <td> 
                            {{Form::text('remarks',$row->remarks,['class'=>'form-control'])}}
                        </td>
                        <td style="width: 50px;">
                            {{Form::hidden('_method','PUT')}}   
                                {{Form::submit('SAVE',['class'=>'btn btn-primary'])}}
                            {!! Form::close() !!} 
                        </td>
                        <td style="width: 50px;">
                            {!!Form::open(['action' => ['ItemsController@destroy', $row->id], 'method' => 'POST','id' => 'FormDeleteTime'])!!}
                                {{Form::hidden('_method', 'DELETE')}}  
                                {{Form::submit('DELETE',['class' => 'btn btn-danger', 'name' => 'delete_modal'])}}
                            {!!Form::close()!!} 
                        </td>
        
                    </tr>
                    @endforeach
                </tbody> 
        
                </table>
        </div>      
</div>
@endsection





