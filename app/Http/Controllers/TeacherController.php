<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassGetRequest;
use App\Http\Requests\TeacherRequest;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response($teachers, 200);
    }

    public function create(TeacherRequest $request)
    {
        $data = $request->validated();
        Teacher::query()->create($data);
        return response("OK", 200);
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->validated();
        $teacher->update($data);
        return response("OK", 200);
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();
        return response("OK", 200);
    }
}
