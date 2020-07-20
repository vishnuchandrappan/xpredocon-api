<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\SuccessWithData;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return new SuccessWithData($users);
    }

    public function create(SignupRequest $request)
    {
        $data = $request->only('name');

        User::create($data);

        return new SuccessResponse('User Created Successfully');
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("User not found", 404);
        }

        return new SuccessWithData($user);
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("User not found", 404);
        }

        $data = $request->only(['name']);

        $user->update($data);

        return new SuccessResponse("Details Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("User not found", 404);
        }

        $user->delete();

        return new SuccessResponse("User Deleted Successfully");
    }
}
