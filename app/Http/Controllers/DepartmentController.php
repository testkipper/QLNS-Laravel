<?php

namespace App\Http\Controllers;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DepartmentController extends Controller
{
    public function index(){
        
        $departments = Department::paginate(10);
        return view('managers\departments', compact('departments'));
    }

    public function insertDepartment(Request $request){
        if ($request->user()->can('create-department')) {
    
   
        $messages=[
                'name.required'=>'Bạn phải nhập tên phòng bang'
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required'
        ],$messages)->validate();
        //$this->validate(request(),['productname'=>'required'];

        $department = Department::create([
            'name' => $request->name          
        ]);
        $success = 'Thêm phòng ban thành công!';
        $departments = Department::paginate(10);
        return view('managers\departments', compact('departments'))->with('success', $success);
        }

        $alert = 'Bạn không có quyền thêm';

        $departments = Department::paginate(10);
        return view('managers\departments', compact('departments'))->with('alert', $alert);
        }

    public function delDepartment(Request $request,$id){
        if ($request->user()->can('create-department')){
        $record = Department::where("id", $id)->first();
        
        
        Department::where("id", $id)->delete();
        $department = Department::paginate(10);
        return redirect()->action([DepartmentController::class, 'index']);
        }
        $alert = 'Bạn không có quyền xóa';

        $departments = Department::paginate(10);
        return view('managers\departments', compact('departments'))->with('alert', $alert);
    }

    public function edit($id)
    {
         $department = Department::where("id", $id)->first();
        return view('managers\editdepartment', compact('department'));
    }

    public function update(Request $request, $id)
    {

         $messages=[
                'name.required'=>'Bạn phải nhập tên phòng bang'
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required'
        ],$messages)->validate();
      
        department::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'name' => $request->name
       ]
      );

      return redirect()->action([DepartmentController::class, 'index']);

    }
}
