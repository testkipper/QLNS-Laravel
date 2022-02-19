@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa lương: {{$salary->id}} {{$salary->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
<form method="POST" action="{{route('salaryUpdate',['id'=>$salary->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$salary->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$salary->id}}">
  </div>

        <div class="form-group">
            @error('base_salary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="exampleInputPassword1">Lương cơ bản</label>
            <input type="text" name='base_salary' class="form-control" id="exampleInputPassword1" value="{{$salary->base_salary}}">
        </div>

        <div class="form-group">
            @error('pay_rate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="exampleInputPassword1">Bậc lương</label>
            <input type="text" name='pay_rate' class="form-control" id="exampleInputPassword1" value="{{$salary->pay_rate}}">
        </div>

          <div class="form-group">
          
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='from_date'  value="{{$salary->from_date}}">
          </div>

          <div class="form-group">
           
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='to_date' value="{{$salary->to_date}}">
        </div>

  
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
</div>



@endsection




