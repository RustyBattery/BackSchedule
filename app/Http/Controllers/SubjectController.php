<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassGetRequest;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response($subjects, 200);
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
