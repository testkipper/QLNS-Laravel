@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa trình độ học vấn: {{$education->id}} {{$education->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
<form method="POST" action="{{route('educationUpdate',['id'=>$education->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$education->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$education->id}}">
    
  </div>
  <div class="form-group">
 
    <label for="exampleInputPassword1">Học vị</label>
    <input type="text" name='name' class="form-control" id="exampleInputPassword1" value="{{$education->name}}">
  </div>
  
  <div class="form-group">
 
    <label for="exampleInputPassword1">Chuyên ngành</label>
    <input type="text" name='major' class="form-control" id="exampleInputPassword1" value="{{$education->major}}">
  </div>

  <button type="submit" class="btn btn-primary">Sửa</button>
</form>
</div>



@endsection




