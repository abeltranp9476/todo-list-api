<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        return response()->json([
            'data' => [
                new UserResource($user)
            ]
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        $response = [
            'result' => 'Todo ok',
        ];

        return $this->responseOk($response);
    }
}
