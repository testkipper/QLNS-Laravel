<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
class EmployeeController extends Controller
{
    public function index(){

        $employees = Employee::paginate(10);
        
        return view('managers\employee', compact('employees'));
    }

    public function addEmployee(Request $request){
        
        $messages=[
                'first_name.required'=>'Bạn phải nhập họ nhân viên',
                'last_name.required'=>'Bạn phải nhập tên nhân viên',
                'phone.required'=>'Bạn phải nhập sđt',
                'email.required'=>'Bạn phải nhập email',
                'birth_date.required'=>'Bạn phải chọn ngày sinh',
                'department_id.required'=>'Bạn phải nhập tên phòng bang',
                'gender.required'=>'Bạn phải chọn giới tính',
                'address.required'=>'Bạn phải nhập địa chỉ',

                ];
        $validator= Validator::make($request -> all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'department_id' => 'required',
            'gender' => 'required',
            'address' => 'required',

        ],$messages)->validate();
       

        $employee = Employee::create([
            'first_name' => $request->inputFirstName,
            'last_name' => $request->inputLastName,
            'phone' => $request->inputPhone,
            'email' => $request->inputEmail,
            'birth_date' => $request->inputBD,
            'department_id' => $request->inputDepartment,
            'gender' => $request->inputGender,
            'address' => $request->inputAddress,          
        ]);
        $success = 'Thêm n thành công!';
        $employees = Employee::paginate(10);
        return view('managers\employee', compact('employees'))->with('success', $success);
    }
    public function insertEmployee(){
        $departments = Department::all();
        return view('managers\addEmployee', compact('departments'));
    }
    /*public function delDepartment($id){
        $record = Department::where("id", $id)->first();
        
        
        Department::where("id", $id)->delete();
        $department = Department::paginate(10);
        return redirect()->action([DepartmentController::class, 'index']);
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

    }*/
}