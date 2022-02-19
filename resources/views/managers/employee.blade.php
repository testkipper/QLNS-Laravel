@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Quản lý nhân viên</h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">quanly-nhanvien</li>
                </ol>

<div class="row">

        <div class="col-md-4">
            <a type="button"  href="{{route('addEmployee')}}"  class="btn btn-outline-primary pull-left">                         
                           Thêm 
             </a>
        </div>
            
        <div class="col-md-8">

                <div class="input-group" id="adv-search">
                <form  id ="find"role="form">
                    <input value="${firstname}" name="firstname" type="text" class="form-control" placeholder="tên đệm và tên" />
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
            <th class="col-lg-0">Mã</th>
            <th class="col-lg-1">Họ</th>
            <th class="col-lg-1">Tên</th>
            <th class="col-lg-1">Giới tính</th>
            <th class="col-lg-1">SĐT</th>
            <th class="col-lg-1">Email</th>
            <th class="col-lg-2">Ngày sinh</th>
            <th class="col-lg-2">Địa chỉ</th>
            <!--<th class="col-lg-1">Phòng ban</th>
            <th class="col-lg-1">Chức vụ</th>
            <th class="col-lg-1">Học vấn</th>-->
            <th class="col-lg-1">Sửa</th>
            <th class="col-lg-1">Xóa</th>
           
       </tr>
    </thead>
    <tbody>

            @forEach($employees as $e)
                <tr>
                    <td>{{$e->id}}</td>
                    <td>{{$e->first_name}}</td>
                    <td>{{$e->last_name}}</td>
                    <td>{{$e->gender}}</td>
                    <td>{{$e->phone}}</td>
                    <td>{{$e->email}}</td>
                    <td>{{$e->birth_date}}</td>
                    <td>{{$e->address}}</td>
                    <!--<td>{{$e->id}}</td>
                    <td></td>
                    <td></td>-->
               
                    <td >
                        <button class="btn btn-outline-primary pull-left"title="chỉnh sửa" data-target="#editModal" data-toggle="modal">
                        <i class="fa fa-edit"></i>
                         </button>
                    </td>
                     <td >
                     <button data-toggle="tooltip" class="btn btn-primary"title="chỉnh sửa" href="">
                               <i class="fa fa-trash" style="color:#ed3c0d"></i>
                             
                         </button>
                    </td>
                </tr>
            @endforeach
      </tbody>

</table>
</div>
    



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exModalLabel">Sửa nhân viên</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form>
      <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="EditFirstNam">Họ</label>
                <input type="text" class="form-control" id="EditFirstName"  placeholder="">    
            </div>

            <div class="form-group col-lg-6">
                <label for="EditLastName">Tên</label>
                <input type="text" class="form-control" id="EditLastName "  placeholder="">    
            </div>
        </div>

        <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="EditPhone">SĐT</label>
                <input type="text" class="form-control" id="EditPhone"  placeholder="">    
            </div>

            <div class="form-group col-lg-6">
                <label for="EditEmail">Email</label>
                <input type="text" class="form-control" id="EditEmail"  placeholder="">    
            </div>
        </div>

        <div class ="form-row" >
            <div class="form-group col-lg-6">
                <label for="EditBD">Ngày sinh</label>
                <input type="date" class="form-control" id="EditBD"  placeholder="">    
            </div>

            <div class="form-group col-lg-6">
            <label for="EditDepartment">Phòng ban</label>
                <select id="EditDepartment" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
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
        
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        
      </div>
      
    </div>
  </div>
</div>            



@stop