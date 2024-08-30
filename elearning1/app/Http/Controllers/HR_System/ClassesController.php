<?php

namespace App\Http\Controllers\HR_System;

use App\DataTables\HR_System\ClassesDataTable;
use App\Http\Controllers\Controller;
use App\Models\HR_system\Classes;
use App\Models\HR_system\Students;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClassesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sm-system.classes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.pages.sm-system.classes.create', compact('users'));
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
            'class_name' => ['required', 'max:50'],
            'user_id' => ['required'],
            'location' => ['required', 'max:30'],
            'desc' => ['required', 'max:30'],
        ]);

        $class = new classes();

        $class->class_name = $request->class_name;
        $class->user_id = $request->user_id;
        $class->location = $request->location;
        $class->desc = $request->desc;
        $class->save();

        $notification = array(
            'message' => 'Class Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.classes.index')->with($notification);
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
        $users = User::all();
        $classes = Classes::findOrFail($id);
        return view('admin.pages.sm-system.classes.edit', compact('classes', 'users'));
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
            'class_name' => ['required', 'max:50'],
            'user_id' => ['required'],
            'location' => ['required', 'max:30'],
            'desc' => ['required', 'max:30'],
        ]);

        $class = Classes::findOrFail($id);

        $class->class_name = $request->class_name;
        $class->user_id = $request->user_id;
        $class->location = $request->location;
        $class->desc = $request->desc;
        $class->save();

        $notification = array(
            'message' => 'class Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.classes.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
