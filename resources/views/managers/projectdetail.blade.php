@extends('layouts.default')
@section('content')
<p class="mt-0">.</p>
<p class="mt-0">.</p>
<h4 class="mttb">Chi tiết dự án</h4>
                <ol class="breadcrumb mb-4 mtt">
                    <li class="breadcrumb-item "><a href="">admin</a></li>
                    <li class="breadcrumb-item active">quanly-chitietduan</li>
                </ol>

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
                                    <label for="firstname">Tên dự án</label>
                                    <input value="${firstname}" name ="firstname" class="form-control" type="text" />
                                  </div>

                                  <div class="form-group">
                                    <label for="medid">Tên dự án</label>
                                    <select  name ="medid"class="form-control">
                                        <option>ALL</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="medid">Tên phòng ban</label>
                                    <select  name ="medid"class="form-control">
                                        <option>ALL</option>
                                    </select>
                                  </div>
                                    
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
            <th class="col-lg-2">Tên phòng ban</th>
            <th class="col-lg-2">Tên dự án</th>
            <th class="col-lg-1">Số lượng việc</th>
            <th class="col-lg-2">Tiến trình làm việc</th>
            <th class="col-lg-2">Công việc hoàn thành</th>
            <th class="col-lg-1">Sửa</th>
            <th class="col-lg-1">Xóa</th>
           
       </tr>
    </thead>
    <tbody>

            <c:forEach items="" var="s">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               
                    <td >
                        <a data-toggle="tooltip" class="btn btn-success"title="chỉnh sửa" href="">
                        <i class="fa fa-edit"></i>
                         </a>
                    </td>
                     <td >
                     <a data-toggle="tooltip" class="btn btn-primary"title="chỉnh sửa" href="">
                               <i class="fa fa-trash" style="color:#ed3c0d"></i>
                             
                         </a>
                    </td>
                </tr>
            </c:forEach>
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
        <h5 class="modal-title" id="exampleModalLabel">Thêm hợp đồng</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form>
      <div class ="form-row" >
                <div class="form-group col-lg-6">
                <label for="inputState">Tên phòng ban</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
                <div class="form-group col-lg-6">
                <label for="inputState">Tên dự án</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
        </div>
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Công việc hoàn thành</label>
            <input type="number" class="form-control" id="exampleInputEmail1"  placeholder=""> 
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tiến trình công việc</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Số lượng công việc</label>
            <input type="number" class="form-control" id="exampleInputPassword1">
          </div>
          </div>  
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        
      </div>
      
    </div>
  </div>
</div>           



@endsection