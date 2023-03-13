<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\BuildingRequest;
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

class BuildingController extends Controller
{

    public function create(BuildingRequest $request)
    {
        $data = $request->validated();
        Building::query()->create($data);
        return response("OK", 200);
    }

    public function update(BuildingRequest $request, Building $building)
    {
        $data = $request->validated();
        $building->update($data);
        return response("OK", 200);
    }

    public function delete(Building $building)
    {
        $building->delete();
        return response("OK", 200);
    }
}
