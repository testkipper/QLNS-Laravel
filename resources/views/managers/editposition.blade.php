@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa chức vụ: {{$position->id}} {{$position->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
<form method="POST" action="{{route('positionUpdate',['id'=>$position->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$position->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$position->id}}">
    
  </div>
  <div class="form-group">
    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    <label for="exampleInputPassword1">Tên chức vụ</label>
    <input type="text" name='name' class="form-control" id="exampleInputPassword1" value="{{$position->name}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection




