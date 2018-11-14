@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: 0%">
        <form action="/search/items" method="GET">
            <div class="input-group mb-3">
                <input class ="float-right form-control" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search items" />
            </div>
        </form>  
        
        {!! Form::open(['action'=>['ItemsController@store'],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
        <div class="form-group row">
                <div style="padding:1%">
                    <label for="name">&nbsp&nbsp&nbsp</label>
                </div>
                <div class="col-md-2">
                    {{Form::text('item','',['class'=>'form-control', 'placeholder'=>'Item'])}}
                </div>
            
                <div class="col-md-2">
                    {{Form::text('desc','',['class'=>'form-control','placeholder'=>'Description'])}}
                </div>
            
                <div class="col-md-2">
                    {{Form::text('quan','',['class'=>'form-control', 'min' => '0', 'placeholder'=>'Quantity'])}}
                </div>
            
                <div class="col-md-2">
                    {{Form::text('unit','',['class'=>'form-control', 'placeholder'=>'Unit'])}}
                </div>
            
                <div class="col-md-2">
                    {{Form::text('remarks','',['class'=>'form-control', 'placeholder'=>'Remarks'])}}
                </div>
        
                <div class="col-md-1">
                     {{Form::submit('Add',['class'=>'btn btn-warning'])}}
                    {!! Form::close() !!} 
                </div>
        
            </div>
            <div class="form-group row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Remarks</th>
                           
                            <th>&nbspAction</th>
                            <th></th>
                        </tr>
                    </thead>   
                <tbody>
                        @foreach($items as $row)
                        {!! Form::open(['action'=>['ItemsController@update', $row->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <tr>
                        <th>
                            <div style="padding:1%">
                                <label for="name">{{$rowNum++}}</label>
                            </div>
                        </th>
                        <td>
                            {{Form::text('item',$row->item,['class'=>'form-control'])}}      
                        </td>
                        <td>
                            {{Form::text('desc',$row->desc,['class'=>'form-control'])}}
                        </td>
                        <td>
                            {{Form::number('quan',$row->quan,['class'=>'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('unit',$row->unit,['class'=>'form-control', 'min'=>'0'])}}                     
                        </td>
                        <td> 
                            {{Form::text('remarks',$row->remarks,['class'=>'form-control', 'min'=>'0'])}}
                        </td>
                        <td>
                            
                                {{Form::hidden('_method','PUT')}}   
                                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                            {!! Form::close() !!} 
                        </td>
                        <td>/</td>
                        <td>
                            {!!Form::open(['action' => ['ItemsController@destroy', $row->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}  
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!} 
                        </td>
        
                    </tr>
                    @endforeach
                </tbody> 
        
                </table>
        </div>      
</div>
@endsection


