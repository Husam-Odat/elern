<?php

namespace App\Http\Controllers\HR_System;

use App\DataTables\HR_System\MarksDataTable;
use App\Http\Controllers\Controller;
use App\Models\HR_system\Students;
use App\Models\HR_system\exams;
use App\Models\HR_system\marks;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MarksDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sm-system.marks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $exams = exams::all();
        return view('admin.pages.sm-system.marks.create', compact('students', 'exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required'],
            'exam_id' => ['required'],
            'marks_amount' => ['required'],
            'exam_start_date' => ['required', 'date'],
            'exam_end_date' => ['required', 'date'],
        ]);

        $marks = new marks();

        $marks->student_id = $request->student_id;
        $marks->exam_id = $request->exam_id;
        $marks->marks_amount = $request->marks_amount;
        $marks->marks_start_date = $request->marks_start_date;
        $marks->marks_end_date = $request->marks_end_date;
        $marks->save();

        $notification = array(
            'message' => 'Marks Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.marks.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Students::all();
        $exams = exams::all();
        $marks = marks::findOrFail($id);
        return view('admin.pages.sm-system.marks.edit', compact('students', 'exams', 'marks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => ['required'],
            'exam_id' => ['required'],
            'marks_amount' => ['required'],
            'exam_start_date' => ['required', 'date'],
            'exam_end_date' => ['required', 'date'],
        ]);

        $marks = marks::findOrFail($id);

        $marks->student_id = $request->student_id;
        $marks->exam_id = $request->exam_id;
        $marks->marks_amount = $request->marks_amount;
        $marks->marks_start_date = $request->marks_start_date;
        $marks->marks_end_date = $request->marks_end_date;
        $marks->save();

        $notification = array(
            'message' => 'marks Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.marks.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marks = marks::findOrFail($id);
        $marks->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
