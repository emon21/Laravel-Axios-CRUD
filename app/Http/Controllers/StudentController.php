<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StudentValidation;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\helpers;

use function App\Helper\uploadImage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $students = Student::orderBy('id', 'DESC')->get();

        // return response()->json($students);

        return view('student.index', compact('students'));
    }

    public function all()
    {
        //

        return Student::orderBy('id', 'DESC')->get();

        // return response()->json($students);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request, Student $student)
    {
        //
        // return $StudentRequest->all();
        // $request->validate([
        //     'studentName' => 'required'
        // ]);

        // return $request->studentName;

        // $data = $request->validated();
        // dd($data);

        $student->studentName = $request->studentName;
        $student->studentEmail = $request->studentEmail;
        $student->studentPhone = $request->studentPhone;

        $student->save();

        // // $dateString = '2023-04-10';
        // // $formattedDate = helpers::formatDate($dateString);
        // // return view('orders.index',
        // //     ['formattedDate' => $formattedDate]
        // // );

        // try {
        //     $student->studentName = $request->studentName;
        //     $student->studentEmail = $request->studentEmail;
        //     $student->studentPhone = $request->studentPhone;
        //     // $student->studentAddress = $request->studentAddress;
        //     // $student->studentImage = $request->studentImage;

        //     // if($request->hasFile('studentImage')){
        //     //     $img = uploadImage($request->file('studentImage'),'student');
        //     //     $student->studentImage = $img;

        //     // }

        //     $student->save();
        // } catch (\Exception $e) {

        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $e->getMessage(),
        //     ]);
        // }

        return redirect()->route('student.index')->with('status', 'Student Created Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Student::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        return Student::find($id);

        // return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // return $request->id;
        $student = Student::find($id);
        $student->studentName = $request->studentName;
        $student->studentName = $request->studentName;
        $student->studentEmail = $request->studentEmail;
        $student->studentPhone = $request->studentPhone;
        $student->save();
        return $student;

        // try {
        //     // $student->studentEmail = $request->studentEmail;
        //     // $student->studentPhone = $request->studentPhone;
        //     // $student->studentAddress = $request->studentAddress;

        //     // if ($request->hasFile('image')) {
        //     //     $student->studentImage = $request->studentImage;
        //     // }

        //     $student->save();
        // } catch (\Exception $e) {

        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $e->getMessage(),
        //     ]);
        // }

        // $student->save();

        // return redirect()->route('student.index')->with('status', 'Student Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $student->delete();


        Student::find($id)->delete();
        return 'ok';
        return redirect()->route('student.index')->with('status', 'Student Deleted Successfully...');
    }
}
