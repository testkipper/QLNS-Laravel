@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa dự án: {{$project->id}} {{$project->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
<form method="POST" action="{{route('projectUpdate',['id'=>$project->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$project->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$project->id}}">
  </div>

        <div class="form-group">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="exampleInputPassword1">Tên dự án</label>
            <input type="text" name='name' class="form-control" id="exampleInputPassword1" value="{{$project->name}}">
        </div>

          <div class="form-group">
          
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='from_date'  value="{{$project->from_date}}">
          </div>

          <div class="form-group">
           
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='to_date' value="{{$project->to_date}}">
        </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection




