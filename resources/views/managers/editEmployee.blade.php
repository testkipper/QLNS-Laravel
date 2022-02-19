@extends('layouts.default')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="modal-body">
       @if($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
               @endforeach
           </ul>
       </div>
       @endif 
      <form method="POST" action="{{route('updateEmployee', ['id'=>$employee->id])}}">
        {{csrf_field()}}
      <div class ="form-row" >
            <div class="form-group col-lg-6">
                 @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="inputFirstName">Họ</label>
                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName"  value="{{$employee -> first_name}}">    
            </div>

            <div class="form-group col-lg-6">
                <label for="inputLastName">Tên</label>
                <input type="text" class="form-control" id="inputLastName"  name="inputLastName" placeholder=""
                value="{{$employee -> last_name}}"
                >    
            </div>
        </div>

        <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="inputPhone">SĐT</label>
                <input type="text" class="form-control" id="inputPhone"  name="inputPhone" placeholder=""
                value="{{$employee -> phone}}"
                >    
            </div>

            <div class="form-group col-lg-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" id="inputEmail" name="inputEmail"  placeholder=""
                value="{{$employee -> email}}"
                >    
            </div>
        </div>

        <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="inputBD">Ngày sinh</label>
                <input type="date" class="form-control" id="inputBD" name="inputBD"  placeholder=""
value="{{$employee -> birth_date}}"
                >    
            </div>

            <div class="form-group col-lg-6">
            <label for="inputDepartment">Phòng ban</label>
                <select id="inputDepartment" name="inputDepartment" class="form-control">
                    <option selected value="{{$employee->department_id}}">{{$employee->department->name}}</option>
                    

                    @foreach($departments as $d)
                    
                    <option value="{{$d->id}}">{{$d->name}}</option>
                    
                    @endforeach
                    
                </select>  
                </div>
         </div>
         <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="inputAddress">Địa chỉ</label>
                <input value= "{{$employee->address}}" type="text" class="form-control" id="inputAddress" name="inputAddress"  placeholder="">    
            </div>

            <div class="form-group col-lg-6">
            <label for="inputGender">Giới tính</label>
                <select id="inputGender" name="inputGender" class="form-control">
                    
                    <option  value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>

                    
                </select>  
                </div>
         </div>

            <!--<div class ="form-row" >
                <div class="form-group col-lg-6">
                <label for="inputState">Học vấn</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
                <div class="form-group col-lg-6">
                <label for="inputState">Chức vụ</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
            </div>-->
        
          <button type="submit" class="btn btn-primary">sửa</button>
        </form>
        
      </div>
@stop