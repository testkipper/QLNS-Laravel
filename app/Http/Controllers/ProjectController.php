<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
    public function index(){

        $projects = Project::paginate(10);
        return view('managers\project', compact('projects'));
    }

    public function insertProject(Request $request){
        $messages=[
                'name.required'=>'Bạn phải nhập tên dự án',
                'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
                'to_date.required'=>'Bạn phải nhập ngày kết thúc',
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ],$messages)->validate();
        //$this->validate(request(),['productname'=>'required'];

        $project = Project::create([
            'name' => $request->name,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,           
        ]);
        $success = 'Thêm phòng ban thành công!';
        $projects = Project::paginate(10);
        return view('managers\project', compact('projects'))->with('success', $success);
    }

    public function delProject($id){
        $record = Project::where("id", $id)->first();
        
        
        Project::where("id", $id)->delete();
        $project = Project::paginate(10);
        return redirect()->action([ProjectController::class, 'index']);
    }

     public function edit($id)
    {
         $project = Project::where("id", $id)->first();
        return view('managers\editproject', compact('project'));
    }

    public function update(Request $request, $id)
    {

         $messages=[
                'name.required'=>'Bạn phải nhập tên dự án',
                'from_date.required'=>'Bạn phải nhập ngày bắt đầu',
                'to_date.required'=>'Bạn phải nhập ngày kết thúc',
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ],$messages)->validate();

        project::updateOrCreate(
        [
            'id' => $id
        ],
        [
            'name' => $request->name,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,      
        ]
        );

      return redirect()->action([ProjectController::class, 'index']);

    }
}
