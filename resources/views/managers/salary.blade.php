@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Quản lý quỹ lương</h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">quanly-quyluong</li>
                </ol>
@if($errors->any())
    <div class="alert alert-danger">
        thêm thất bại
    </div>
@endif

@if(!$errors->any())
    <div class="alert alert-success">
        thêm thành công
    </div>
@endif
<div class="row">

        <div class="col-md-4">
            <button  type="button" data-toggle="modal" data-target="#createModal"  class="btn btn-outline-primary pull-left">                         
                           Thêm 
             </button>
        </div>
            
        <div class="col-md-8">

                <div class="input-group" id="adv-search">
                <form  id ="find"role="form">
                    <input value="${firstname}" name="firstname" type="text" class="form-control" placeholder="tên điệm và tên" />
                </form>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle ml-1" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form  class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="lastname">Tên dự án</label>
                                    <input value="${lastname}" name ="lastname" class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="firstname">Ngày bắt đầu</label>
                                    <input value="${firstname}" name ="firstname" class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="firstname">Ngày kết thúc</label>
                                    <input value="${firstname}" name ="firstname" class="form-control" type="text" />
                                  </div>
                                  <!-- <div class="form-group">
                                    <label for="medid">Chuyên khoa</label>
                                    <select  name ="medid"class="form-control">
                                        <option value="all" <c:if test="${medid.equals('all')}">selected</c:if>>ALL</option>
                                        <c:forEach items="${medicals}" var="med">             
                                                <option value="${med.id}"<c:if test="${medid.equals(Integer.toString(med.id))}"> selected</c:if>>${med.name}</option>
                                        </c:forEach>
                                    </select>
                                  </div> -->
                                    
                                  <div class="form-group">
                                    <label for="account">Account</label>
                                    <select  name ="account"class="form-control">
                                        <option value="all" <c:if test="${account.equals('all')}"></c:if>>Tất cả</option>
                                        <option value="1"
                                        <c:if test="${account.equals('1')}"></c:if>
                                        >Đã cấp</option>
                                        <option value="0"
                                        <c:if test="${account.equals('0')}"></c:if>>Chưa cấp</option>
                                    </select>
                                  </div>  
                                    
                                  
                                  <div class="form-group">
                                     <label for="pagequan">Số lượng hiển thị</label>
                                     <input autocomplete="off" value="${pagequan}" class="form-control" name ="pagequan"maxlength="3" type="text" onkeypress="return onlyNumberKey(event)" list="cars" />
                                     <datalist id="cars">
                                          <option>all</option>
                                     </datalist>
                                  </div>
                                    
                                  <button type="submit" class="btn btn-primary">Tìm</button>
                                </form>
                            </div>
                        </div>
                        <button type="submit" form="find" class="btn btn-primary ml-3">LỌC</button>
                        
                    </div>
                </div>
            </div>
          </div>
                                     <br><!-- comment -->

                                     <div id="managerTable" class="table table-striped w-auto" >

    
        <table  class="slide-table table table-striped table-bordered" width="100%">
  
    <thead>
       <tr>
            <th class="col-lg-1">Mã</th>           
            <th class="col-lg-2">Lương cơ bản</th>
            <th class="col-lg-3">Bậc lương</th>
            <th class="col-lg-3">Ngày bắt đầu</th>
            <th class="col-lg-3">Ngày kết thúc</th>
            <th class="col-lg-1">Sửa</th>
            <th class="col-lg-1">Xóa</th>
           
       </tr>
    </thead>
    <tbody>

            @foreach($salaries as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->base_salary}}</td>
                    <td>{{$s->pay_rate}}</td>
                    <td>{{$s->from_date}}</td>
                    <td>{{$s->to_date}}</td>
               
                    <td >
                        <a data-toggle="tooltip" class="btn btn-success"title="chỉnh sửa" href="{{route('salaryEdit',['id'=>$s->id])}}">
                        <i class="fa fa-edit"></i>
                         </a>
                    </td>
                     <td >
                     <a data-toggle="tooltip" class="btn btn-primary"title="chỉnh sửa" href="{{route('delSalary',['id' => $s->id])}}">
                               <i class="fa fa-trash" style="color:#ed3c0d"></i>
                             
                         </a>
                    </td>
                </tr>
            @endforeach
      </tbody>

</table>
</div>
    
    <!-- Modal
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn chắn xóa 
      </div>
      <div class="modal-footer">
          <a href="" class="btn btn-primary" id="delRef">Vâng,tôi chắc</a> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> -->


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="{{route('insertSalary')}}">
        {{csrf_field()}}
          <div class="form-group">
              @error('base_salary')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <label for="exampleInputEmail1">Lương cơ bản</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name='base_salary'  placeholder="">
          </div>

          <div class="form-group">
              @error('pay_rate')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <label for="exampleInputEmail1">Bậc lương</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name='pay_rate'  placeholder="">
          </div>

          <div class="form-group">
              @error('from_date')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <label for="exampleInputEmail1">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='from_date'  placeholder="">
          </div>

          <div class="form-group">
              @error('to_date')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <label for="exampleInputEmail1">Ngày kết thúc</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name='to_date'  placeholder="">
          </div>

          <button type="submit" class="btn btn-primary mttb">Thêm</button>
        </form>
        
      </div>
      
    </div>
  </div>
</div>           



@endsection