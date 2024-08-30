<?php

namespace App\Http\Controllers\HR_System;

use App\DataTables\HR_System\VacationsDataTable;
use App\Http\Controllers\Controller;
use App\Models\HR_system\Students;
use App\Models\HR_system\Vacations;
use Illuminate\Http\Request;

class VacationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VacationsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sm-system.vacations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        return view('admin.pages.sm-system.vacations.create', compact('students'));
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
            'vacation_type' => ['required'],
            'status' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $vacation = new Vacations();

        $vacation->student_id = $request->student_id;
        $vacation->vacation_type = $request->vacation_type;
        $vacation->status = $request->status;
        $vacation->start_date = $request->start_date;
        $vacation->end_date = $request->end_date;
        $vacation->save();

        $notification = array(
            'message' => 'Vacation Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.vacations.index')->with($notification);
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
        $vacation = Vacations::findOrFail($id);
        return view('admin.pages.sm-system.vacations.edit', compact('vacation', 'students'));
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
            'vacation_type' => ['required'],
            'status' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $vacation = Vacations::findOrFail($id);

        $vacation->student_id = $request->student_id;
        $vacation->vacation_type = $request->vacation_type;
        $vacation->status = $request->status;
        $vacation->start_date = $request->start_date;
        $vacation->end_date = $request->end_date;
        $vacation->save();

        $notification = array(
            'message' => 'Vacation Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.vacations.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacation = Vacations::findOrFail($id);
        $vacation->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
