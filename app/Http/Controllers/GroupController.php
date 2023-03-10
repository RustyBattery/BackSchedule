<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassGetRequest;
use App\Http\Requests\GroupRequest;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return response($groups, 200);
    }

    public function create(GroupRequest $request)
    {
        $data = $request->validated();
        Group::query()->create($data);
        return response("OK", 200);
    }

    public function update(GroupRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);
        return response("OK", 200);
    }

    public function delete(Group $group)
    {
        $group->delete();
        return response("OK", 200);
    }
}
