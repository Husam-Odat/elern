<?php

namespace App\Http\Controllers\HR_System;

use App\DataTables\HR_System\StudentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\HR_system\Students;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sm-system.students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sm-system.students.create');
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
            'image' => ['required', 'max:4196', 'image'],
            'username' => ['required', 'max:50'],
            'first_name' => ['required', 'max:30'],
            'last_name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'gender' => ['required'],
            'bod' => ['required'],
        ]);

        $student = new Students();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $student->image = $imagePath;
        $student->username = $request->username;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->bod;
        $student->save();

        $notification = array(
            'message' => 'Student Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.students.index')->with($notification);
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
        $student = Students::findOrFail($id);
        return view('admin.pages.sm-system.students.edit', compact('student'));
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
            'image' => ['nullable', 'max:4196', 'image'],
            'username' => ['required', 'max:50'],
            'first_name' => ['required', 'max:30'],
            'last_name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'gender' => ['required'],
            'bod' => ['required'],
        ]);

        $student = students::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $student->image);

        $student->image = empty(!$imagePath) ? $imagePath : $student->image;
        $student->username = $request->username;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->bod;
        $student->save();

        $notification = array(
            'message' => 'Employee Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.employees.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $this->deleteImage($student->image);
        $student->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
