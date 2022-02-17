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
    public function delDepartment($id){
        $record = Department::where("id", $id)->first();
        
        
        Department::where("id", $id)->delete();
        $department = Department::paginate(10);
        return redirect()->action([DepartmentController::class, 'index']);
    }
}
