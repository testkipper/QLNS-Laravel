@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa phòng ban: {{$department->id}} {{$department->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
  
<form method="POST" action="{{route('departmentupdate',['id'=>$department->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$department->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$department->id}}">
    
  </div>
  <div class="form-group">
    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    <label for="exampleInputPassword1">Tên phòng ban</label>
    <input type="text" name='name' class="form-control" id="exampleInputPassword1" value="{{$department->name}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection




