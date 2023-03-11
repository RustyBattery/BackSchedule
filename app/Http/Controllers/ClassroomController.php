<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassGetRequest;
use App\Models\Building;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $buildings = Building::with(['classrooms'])->get();
        return response($buildings, 200);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
