<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function index(){

        $educations = Education::paginate(10);
        return view('managers\education', compact('educations'));
    }

    public function insertEducation(Request $request){
        $messages=[
                'name.required'=>'Bạn phải nhập học vị',
                'major.required' => 'Bạn phải nhập chuyên ngành',
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'major' => 'required',
        ],$messages)->validate();
       

        $education = Education::create([
            'name' => $request->name, 
            'major' => $request->major,         
        ]);
        $success = 'Thêm trình độ học vấn thành công!';
        $educations = Education::paginate(10);
        return view('managers\education', compact('educations'))->with('success', $success);
    }

    public function delEducation($id){
        $record = Education::where("id", $id)->first();
        
        
        Education::where("id", $id)->delete();
        $education = Education::paginate(10);
        return redirect()->action([EducationController::class, 'index']);
    }

    public function edit($id)
    {
         $education = Education::where("id", $id)->first();
        return view('managers\editeducation', compact('education'));
    }

    public function update(Request $request, $id)
    {

         $messages=[
            'name.required'=>'Bạn phải nhập học vị',
            'major.required' => 'Bạn phải nhập chuyên ngành'
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required',
            'major' => 'required'
        ],$messages)->validate();

        Education::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'name' => $request->name,
        'major' => $request->major
       ]
      );

      return redirect()->action([EducationController::class, 'index']);

    }
}
