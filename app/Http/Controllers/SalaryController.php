<?php

namespace App\Http\Controllers;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SalaryController extends Controller
{
    public function index(){
        $salaries = Salary::paginate(10);
        return view('managers\salary', compact('salaries'));
    }

    public function insertSalary(Request $request){
        $messages=[
                'base_salary.required'=>'Bạn phải nhập lương cơ bản',
                'pay_rate.required'=>'Bạn phải nhập hệ số lương',
                'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
                'to_date.required'=>'Bạn phải nhập ngày kết thúc',
                ];
        $validator= Validator::make($request -> all(),[
            'base_salary' => 'required',
            'pay_rate' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ],$messages)->validate();
        //$this->validate(request(),['productname'=>'required'];

        $salary = Salary::create([
            'base_salary' => $request->base_salary,
            'pay_rate' => $request->pay_rate,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,           
        ]);
        $success = 'Thêm lương thành công!';
        $salaries = Salary::paginate(10);
        return view('managers\salary', compact('salaries'))->with('success', $success);
    }

    public function delSalary($id){
        $record = Salary::where("id", $id)->first();
        
        
        Salary::where("id", $id)->delete();
        $salary = Salary::paginate(10);
        return redirect()->action([SalaryController::class, 'index']);
    }

     public function edit($id)
    {
         $salary = Salary::where("id", $id)->first();
        return view('managers\editsalary', compact('salary'));
    }

    public function update(Request $request, $id)
    {

         $messages=[
            'base_salary.required'=>'Bạn phải nhập lương cơ bản',
            'pay_rate.required'=>'Bạn phải nhập hệ số lương',
            'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
            'to_date.required'=>'Bạn phải nhập ngày kết thúc',
                ];
        $validator= Validator::make($request -> all(),[
            'base_salary' => 'required',
            'pay_rate' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ],$messages)->validate();

        Salary::updateOrCreate(
        [
            'id' => $id
        ],
        [
            'base_salary' => $request->base_salary,
            'pay_rate' => $request->pay_rate,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,      
        ]
        );

      return redirect()->action([SalaryController::class, 'index']);

    }
}
