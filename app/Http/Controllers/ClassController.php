<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassCreateRequest;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ClassController extends Controller
{
    public function index(){

    }

    public function create(ClassCreateRequest $request){
        $data = $request->validated();
        $class = ClassModel::query()->create($data);
        foreach ($data['groups_id'] as $group){
            ClassGroup::query()->create(['class_id' => $class->id, 'group_id' => $group]);
        }
        return response("OK", 200);
    }

    public function update(){

    }

    public function delete(ClassModel $class){

    }
}
