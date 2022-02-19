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
    public function insertEmployee(){
        $departments = Department::all();
        return view('managers\addEmployee', compact('departments'));
    }

    public function addEmployee(Request $request){
        
        $messages=[
                'inputFirstName.required'=>'Bạn phải nhập họ nhân viên',
                'inputLastName.required'=>'Bạn phải nhập tên nhân viên',
                'inputPhone.required'=>'Bạn phải nhập sđt',
                'inputEmail.required'=>'Bạn phải nhập email',
                'inputBD.required'=>'Bạn phải chọn ngày sinh',
                'inputDepartment.required'=>'Bạn phải nhập tên phòng bang',
                'inputGender.required'=>'Bạn phải chọn giới tính',
                'inputAddress.required'=>'Bạn phải nhập địa chỉ'

                ];
        $validator= Validator::make($request -> all(),[
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputPhone' => 'required',
            'inputEmail' => 'required',
            'inputBD' => 'required',
            'inputDepartment' => 'required',
            'inputGender' => 'required',
            'inputAddress' => 'required'

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
    
    public function delDepartment($id){
        $record = Department::where("id", $id)->first();
        
        
        Department::where("id", $id)->delete();
        $department = Department::paginate(10);
        return redirect()->action([DepartmentController::class, 'index']);
    }

    public function edit($id)
    {
        $departments = Department::all();
         $employee = Employee::where("id", $id)->first();
        return view('managers\editEmployee', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
          $messages=[
                'inputFirstName.required'=>'Bạn phải nhập họ nhân viên',
                'inputLastName.required'=>'Bạn phải nhập tên nhân viên',
                'inputPhone.required'=>'Bạn phải nhập sđt',
                'inputEmail.required'=>'Bạn phải nhập email',
                'inputBD.required'=>'Bạn phải chọn ngày sinh',
                'inputDepartment.required'=>'Bạn phải nhập tên phòng bang',
                'inputGender.required'=>'Bạn phải chọn giới tính',
                'inputAddress.required'=>'Bạn phải nhập địa chỉ'

                ];
        $validator= Validator::make($request -> all(),[
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputPhone' => 'required',
            'inputEmail' => 'required',
            'inputBD' => 'required',
            'inputDepartment' => 'required',
            'inputGender' => 'required',
            'inputAddress' => 'required'

        ],$messages)->validate();

      employee::updateOrCreate(
       [
        'id' => $id
       ],
       [
            'first_name' => $request->inputFirstName,
            'last_name' => $request->inputLastName,
            'phone' => $request->inputPhone,
            'email' => $request->inputEmail,
            'birth_date' => $request->inputBD,
            'department_id' => $request->inputDepartment,
            'gender' => $request->inputGender,
            'address' => $request->inputAddress
       ]
      );
        
       return redirect()->action([EmployeeController::class, 'index']);


    }

    public function delete(Request $request,$id){
        if ($request->user()->can('create-department')){
        $record = Employee::where("id", $id)->first();
        
        Employee::where("id", $id)->delete();
        $Employee = Employee::paginate(10);
        return redirect()->action([EmployeeController::class, 'index']);
        
        }
        $alert = 'Bạn không có quyền xóa';

        $employees = Employee::paginate(10);
        
        return view('managers\employee', compact('employees'))->with('alert', $alert);;
    }

}