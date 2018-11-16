@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: 0%" >
        <form action="/search/items" method="GET">
            <div class="input-group mb-3">
                <input class ="float-right form-control" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search items" />
            </div>
        </form>  
        
        {!! Form::open(['action'=>['ItemsController@store'],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                {{Form::text('item','',['class'=>'form-control', 'placeholder'=>'Item'])}}        
                            </th>
                            <th>
                                {{Form::text('desc','',['class'=>'form-control','placeholder'=>'Description'])}}                    
                            </th>
                            <th>
                                {{Form::text('brand','',['class'=>'form-control','placeholder'=>'Brand'])}}
                            </th>
                            <th>
                                {{Form::text('quan','',['class'=>'form-control', 'min' => '0', 'placeholder'=>'Quantity'])}}
                            </th>
                            <th>
                                {{Form::text('unit','',['class'=>'form-control', 'placeholder'=>'Unit'])}}
                            </th>
                            <th>
                                {{Form::text('remarks','',['class'=>'form-control', 'placeholder'=>'Remarks'])}}
                            </th>
                            <th>   
                                 {{Form::submit('ADD',['class'=>'btn btn-warning openbutton'])}}
                                 {!! Form::close() !!} 
                            </th>
                        </tr>
                                 
                    </thead>
                </table>
        
            </div>
        
            
            <div class="form-group row" style="margin-left:-5%; margin-right:-5">
                    <div class="col-md-6">
                            <a class="btn btn-dark float-left" role="button" href="/home" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>   
                    </div>
                    
                  <div class="col-md-6">
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
                 </div>   
                          <br><br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Remarks</th>
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
                                <td>
                                    {{Form::number('quan',$row->quan,['class'=>'form-control btn-danger'])}}
                                </td>
                            @else
                                <td>
                                    {{Form::number('quan',$row->quan,['class'=>'form-control'])}}
                                </td>
                            @endif
                        <td>
                            {{Form::text('unit',$row->unit,['class'=>'form-control', 'min'=>'0'])}}                     
                        </td>
                        <td> 
                            {{Form::text('remarks',$row->remarks,['class'=>'form-control', 'min'=>'0'])}}
                        </td>
                        <td>
                            {{Form::hidden('_method','PUT')}}   
                                {{Form::submit('SAVE',['class'=>'btn btn-primary'])}}
                            {!! Form::close() !!} 
                        </td>
                        <td>
                            {!!Form::open(['action' => ['ItemsController@destroy', $row->id], 'method' => 'POST'])!!}
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





