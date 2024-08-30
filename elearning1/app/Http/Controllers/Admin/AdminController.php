<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.admins.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            // 'username' => ['required', 'max:30', 'regex:/^[a-zA-Z\s]+$/'],
            // 'name' => ['required', 'max:30', 'regex:/^[a-zA-Z\s]+$/'],
            // 'email' => 'required|email|unique:admins',
            // 'password' => [
            //     'required',
            //     'min:8',
            //     'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            // ]
        ]);

        $input = $request->all();
        User::create([
            // 'username' => $request->username,
            'name' => $request->name,
            // 'lastName' => $request->lastName,
            // 'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Hash the password

        ]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'New admin added successfully.');
    }


    public function update(Request $request, $id)
    {
        // Find the existing user by ID
        $user = User::findOrFail($id);

        // Validate the request inputs
        $request->validate([
            'username' => ['required', 'max:30', 'regex:/^[a-zA-Z\s]+$/'],
            'name' => ['required', 'max:30', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => [
                'required',
                'email',
                Rule::unique('admins')->ignore($user->id), // Ensure unique email, ignoring the current user's email
            ],
            'password' => [
                'nullable', // Password is optional on update
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        // Get all input data
        $input = $request->all();

        // Update the user's information
        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password // Hash the password if provided
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    // public function index()
    // {
    //     $users = User::all();
    //     return response()->json($users, 200);
    // }

    // public function getTable(): string
    // {
    //     return "users";
    // }

    // public function index(CategoriesDataTable $dataTable)
    // {
    //     return $dataTable->render('admin.pages.categories.index');
    // }
}