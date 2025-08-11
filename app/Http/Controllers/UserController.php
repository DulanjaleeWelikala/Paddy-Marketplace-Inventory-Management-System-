<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Show create user form
    public function create()
    {
        return view('admin.create-user');
    }

    // Store new user
    public function store(Request $request)
   {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'usertype' => 'required|string',
        'password' => 'required|string|min:6',
    ]);

    $validated['password'] = bcrypt($validated['password']); // Encrypt password

    User::create($validated);

    return redirect()->route('users.index')->with('success', 'User added successfully!');
   }


    // Show edit form
    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }


    // Update user
    public function update(Request $request, $id)
   {
    $user = User::findOrFail($id);

    //Validate the request and assign the result to $validated
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'usertype' => 'required|string',
    ]);

    //Now $validated is defined and can be used
    $user->update($validated);

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
   }


    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
               return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    
     
    //user suspend
   public function toggleSuspend(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->suspended = !$user->suspended;

    if ($user->suspended) {
        $user->suspension_reason = $request->input('reason');
    } else {
        $user->suspension_reason = '';
    }
    
    $user->save();

    return redirect()->back()->with('success', 'User status updated successfully.');
}



    

}


