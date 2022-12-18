<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function getData(){
        try{
            $students = Student::all();
            return \response([
                'students'=>$students,
                'message'=>'Success'
            ]);
        }catch(Exception $ex){
            return \response([
                'message'=>$ex->getMessage()
            ]);
        }
    }

    public function storeData(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:12',
            'email' => 'required|email',
            'address' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return \response([
                'message' => $validator->errors()->all()
            ]);
        }

        try{
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->user_id = $request->user_id;
            $student->save();

            return response([
                'message' => 'Student Created',
                'student' => $student
            ]);

        }catch(Exception $ex){
            return redirect([
                'message' => $ex->getMessage()
            ]);
        }
    }

    public function updateData(Request $request , $id)
    {
        try {
            $student = Student::find($id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->user_id = $request->user_id;
            $student->update();

            return \response([
                'message'=>'Student updated',
                'student'=>$student
            ]);
        } catch (\Throwable $th) {
            return \response([
                'message'=>$th->getMessage()
            ]);
        }
    }

    public function deleteData($id)
    {
        try {
            $student = Student::find($id)->delete();

            return \response([
                'message'=>'Student deleted'
            ]);
        } catch (\Throwable $th) {
            return \response([
                'message'=>$th->getMessage()
            ]);
        }
    }

    public function uploadImage(Request $request)
    {
        try {
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $picture = \date('His').'-'.$filename;
                $file->move(\public_path('upload'),$picture);
                return \response([
                    'message'=>'Image uploaded',
                    'file'=>$picture
                ]);
            }else{
                return \response([
                    'message'=>'Select image first'
                ]);
            }
        } catch (\Throwable $th) {
            return \response([
                'message'=> $th->getMessage()
            ]);
        }
    }

}