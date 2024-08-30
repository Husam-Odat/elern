<?php

namespace App\Http\Controllers\HR_System;

use App\DataTables\HR_System\ExamsDataTable;
use App\Http\Controllers\Controller;
use App\Models\HR_system\exams;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExamsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sm-system.exams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sm-system.exams.create');
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
            'exam_title' => ['required', 'max:50'],
            'marks' => ['required'],
            'exam_desc' => ['required', 'max:100'],
        ]);

        $exams = new exams();

        $exams->exam_title = $request->exam_title;
        $exams->marks = $request->marks;
        $exams->exam_desc = $request->exam_desc;
        $exams->save();

        $notification = array(
            'message' => 'Exam Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.exams.index')->with($notification);
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
        $exam = exams::findOrFail($id);
        return view('admin.pages.sm-system.exams.edit', compact('exam'));
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
            'exam_title' => ['required', 'max:50'],
            'marks' => ['required'],
            'exam_desc' => ['required', 'max:100'],
        ]);

        $exams = exams::findOrFail($id);

        $exams->exam_title = $request->exam_title;
        $exams->marks = $request->marks;
        $exams->exam_desc = $request->exam_desc;
        $exams->save();

        $notification = array(
            'message' => 'Exam Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.exams.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = exams::findOrFail($id);
        $exam->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
