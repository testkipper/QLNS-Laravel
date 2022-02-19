<?php

namespace App\Http\Controllers;
use App\Models\LabourContract;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LabourContractController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $contracts = LabourContract::paginate(10);
        return view('managers\labourcontract', compact('contracts', 'employees'));
    }

    public function insertLabourContract(Request $request){
        $messages=[
                'name.required'=>'Bạn phải nhập tên hợp đồng',
                'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
                'to_date.required'=>'Bạn phải nhập ngày kết thúc',
                'employee_id.required'=>'Bạn phải nhập nhân viên',
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'employee_id' => 'required'
        ],$messages)->validate();
        //$this->validate(request(),['productname'=>'required'];

     
        
        $contract = LabourContract::create([
            'name' => $request->name,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date, 
            'employee_id' => $request -> employee_id          
        ]);
        $success = 'Thêm hợp đồng thành công!';
        $contracts = LabourContract::paginate(10);
        return view('managers\labourcontract', compact('contracts'))->with('success', $success);
    }

    public function delLabourContract($id){
        $record = LabourContract::where("id", $id)->first();
        
        
        LabourContract::where("id", $id)->delete();
        $contract = LabourContract::paginate(10);
        return redirect()->action([LabourContractController::class, 'index']);
    }

     public function edit($id)
    {    $employee = Employee::all();
         $contract = LabourContract::where("id", $id)->first();
        return view('managers\editlabourcontract', compact('contract', 'employee'));
    }

    public function update(Request $request, $id)
    {

         $messages=[
            'name.required'=>'Bạn phải nhập tên hợp đồng',
            'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
            'to_date.required'=>'Bạn phải nhập ngày kết thúc',
            'employee_id.required'=>'Bạn phải nhập nhân viên',
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'employee_id' => 'required'
        ],$messages)->validate();

        LabourContract::updateOrCreate(
        [
            'id' => $id
        ],
        [
            'name' => $request->name,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date, 
            'employee_id' => $request -> employee_id,              
        ]
        );

      return redirect()->action([LabourContractController::class, 'index']);

    }
}
