<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // Use the userService to fetch users
        $users = $this->userService->getUsers();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Use the userService to fetch a single user
        $user = $this->userService->getUserById($id);

        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // Other validation rules...
        ]);

        // Create user using the userService
        $user = $this->userService->createUser($validatedData);

        return redirect()->route('users.show');
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // Other validation rules...
        ]);

        // Update user using the userService
        $user = $this->userService->updateUser($id, $validatedData);

        return redirect()->route('users.show');
    }

    public function destroy($id)
    {
        // Delete user using the userService
        $this->userService->deleteUser($id);

        return redirect()->route('users.index');
    }
}
