@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chỉnh sửa hợp đồng: {{$contract->id}} {{$contract->name}} </h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">chỉnh sửa</li>
                </ol>

<div class="container-fluid">
<form method="POST" action="{{route('labourContractUpdate',['id'=>$contract->id])}}">
     @csrf
  <div class="form-group">
   <strong><label for="id">ID: {{$contract->id}}</label></strong> 
    <input type="hidden" class="form-control" value="{{$contract->id}}">
  </div>

        <div class="form-group">
           
            <label for="exampleInputPassword1">Tên dự án</label>
            <input type="text" name='name' class="form-control" id="exampleInputPassword1" value="{{$contract->name}}">
        </div>

          <div class="form-group">
          
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='from_date'  value="{{$contract->from_date}}">
          </div>

          <div class="form-group">
         
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='to_date' value="{{$contract->to_date}}">
        </div>

        <div class="form-group">
          
            <label for="inputState">Tên nhân viên</label>
              <select path="employee" id="e" class="form-control">
                @foreach($employee as $e)
                <option value="{{$e->id}}">{{$e->first_name}}</option>
                @endforeach
              </select>
        </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection




