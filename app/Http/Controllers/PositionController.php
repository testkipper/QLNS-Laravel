<?php

namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PositionController extends Controller
{
    public function index(){

        $positions = Position::paginate(10);
        return view('managers\position', compact('positions'));
    }

    public function insertPosition(Request $request){
        $messages=[
                'name.required'=>'Bạn phải nhập tên chức vụ'
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required'
        ],$messages)->validate();
        //$this->validate(request(),['productname'=>'required'];

        $position = Position::create([
            'name' => $request->name          
        ]);
        $success = 'Thêm chức vụ thành công!';
        $positions = Position::paginate(10);
        return view('managers\position', compact('positions'))->with('success', $success);
    }

    public function delPosition($id){
        $record = Position::where("id", $id)->first();
        Position::where("id", $id)->delete();
        $position = Position::paginate(10);
        return redirect()->action([PositionController::class, 'index']);
    }

    public function edit($id)
    {
        $position = Position::where("id", $id)->first();
        return view('managers\editposition', compact('position'));
    }

    public function update(Request $request, $id)
    {
         $messages=[
                'name.required'=>'Bạn phải nhập tên chức vụ'
                ];
        $validator= Validator::make($request -> all(),[
            'name' => 'required'
        ],$messages)->validate();
        
        position::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'name' => $request->name
       ]
      );

      return redirect()->action([PositionController::class, 'index']);

    }
}
