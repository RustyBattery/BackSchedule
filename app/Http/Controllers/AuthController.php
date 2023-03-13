<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassGetRequest;
use App\Http\Requests\UserRequest;
use App\Models\Building;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::query()->create($data);
        $token = $user->createToken("auth");
        return response(['token' => $token->plainTextToken, 'user' => $user], 200);
    }

    public function login(AuthLoginRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->where('email', $data['email'])->first();
        if(Hash::check($data['password'], $user->password)){
            $user->tokens()->delete();
            $token = $user->createToken("auth");
            return response(['token' => $token->plainTextToken, 'user' => $user], 200);
        }
        throw new CustomException("Invalid password!", 400);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return response("OK", 200);
    }

}
