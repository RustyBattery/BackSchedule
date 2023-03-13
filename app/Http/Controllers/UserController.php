<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
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

class UserController extends Controller
{
    public function index(){
        $users = User::with(['group', 'teacher'])->get();
        return response($users, 200);
    }

    public function update(UserRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();
        $user->update($data);
        return response("OK", 200);
    }

    public function attach(User $user, Teacher $teacher)
    {
        $user->teacher_id = $teacher->id;
        $user->save();
        return response("OK", 200);
    }

}
