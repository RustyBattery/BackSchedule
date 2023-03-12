<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\ClassCreateRequest;
use App\Http\Requests\ClassDeleteRequest;
use App\Http\Requests\ClassGetRequest;
use App\Models\ClassGroup;
use App\Models\ClassModel;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ClassController extends Controller
{
    public function index(ClassGetRequest $request)
    {
        $data = $request->validated();
        if (isset($data['group_id'])) {
            $classes = ClassModel::with(['subject', 'teacher', 'classroom', 'timeslot', 'groups'])
                ->whereHas('groups', function ($q) use ($data) {
                    $q->where('group_id', '=', $data['group_id']);
                })
                ->where(function ($query) use ($data){
                    $query->where(function ($query) use ($data){//start
                        $query->whereDate('date_start', '>=', Carbon::create($data['date_start']))
                            ->whereDate('date_start', '<=', Carbon::create($data['date_start'])->addDay(6));
                    })
                    ->orWhere(function ($query) use ($data){//end
                        $query->whereDate('date_end', '>=', Carbon::create($data['date_start']))
                            ->whereDate('date_end', '<=', Carbon::create($data['date_start'])->addDay(6));
                    })
                    ->orWhere(function ($query) use ($data){//nothing
                        $query->whereDate('date_start', '<', Carbon::create($data['date_start']))
                            ->whereDate('date_end', '>', Carbon::create($data['date_start'])->addDay(6));
                    });
                })->get();
            foreach ($classes as $class) {
                $class->building();
            }
            return $classes;
        }
        if (isset($data["teacher_id"])) {
            $classes = ClassModel::with(['subject', 'teacher', 'classroom', 'timeslot', 'groups'])
                ->whereHas('teacher', function ($q) use ($data) {
                    $q->where('teacher_id', '=', $data['teacher_id']);
                })
                ->where(function ($query) use ($data){
                    $query->where(function ($query) use ($data){//start
                        $query->whereDate('date_start', '>=', Carbon::create($data['date_start']))
                            ->whereDate('date_start', '<=', Carbon::create($data['date_start'])->addDay(6));
                    })
                        ->orWhere(function ($query) use ($data){//end
                            $query->whereDate('date_end', '>=', Carbon::create($data['date_start']))
                                ->whereDate('date_end', '<=', Carbon::create($data['date_start'])->addDay(6));
                        })
                        ->orWhere(function ($query) use ($data){//nothing
                            $query->whereDate('date_start', '<', Carbon::create($data['date_start']))
                                ->whereDate('date_end', '>', Carbon::create($data['date_start'])->addDay(6));
                        });
                })->get();
            foreach ($classes as $class) {
                $class->building();
            }
            return $classes;
        }
        if (isset($data['classroom_id'])) {
            $classes = ClassModel::with(['subject', 'teacher', 'classroom', 'timeslot', 'groups'])
                ->whereHas('classroom', function ($q) use ($data) {
                    $q->where('classroom_id', '=', $data['classroom_id']);
                })
                ->where(function ($query) use ($data){
                    $query->where(function ($query) use ($data){//start
                        $query->whereDate('date_start', '>=', Carbon::create($data['date_start']))
                            ->whereDate('date_start', '<=', Carbon::create($data['date_start'])->addDay(6));
                    })
                        ->orWhere(function ($query) use ($data){//end
                            $query->whereDate('date_end', '>=', Carbon::create($data['date_start']))
                                ->whereDate('date_end', '<=', Carbon::create($data['date_start'])->addDay(6));
                        })
                        ->orWhere(function ($query) use ($data){//nothing
                            $query->whereDate('date_start', '<', Carbon::create($data['date_start']))
                                ->whereDate('date_end', '>', Carbon::create($data['date_start'])->addDay(6));
                        });
                })->get();
            foreach ($classes as $class) {
                $class->building();
            }
            return $classes;
        }
        throw new CustomException("The group, the teacher, the classroom are not defined!", 400);
    }

    public function create(ClassCreateRequest $request)
    {
        $data = $request->validated();
        $class = ClassModel::query()->create($data);
        foreach ($data['groups_id'] as $group) {
            ClassGroup::query()->create(['class_id' => $class->id, 'group_id' => $group]);
        }
        return response("OK", 200);
    }

    public function update()
    {

    }

    public function delete(ClassDeleteRequest $request, ClassModel $class)
    {
        $data = $request->validated();
        if(isset($data['date'])){
            if(Carbon::create($data['date']) == Carbon::create($class->date_start)){
                $class->date_start = Carbon::create($class->date_start)->addDay();
                $class->save();
                return response("OK", 200);
            }
            if(Carbon::create($data['date']) == Carbon::create($class->date_end)){
                $class->date_end = Carbon::create($class->date_end)->subDay();
                $class->save();
                return response("OK", 200);
            }
            $class_prev = $class->toArray();
            $class_prev["date_end"] = Carbon::create($data['date'])->subDay();
            ClassModel::query()->create($class_prev);
            $class_next = $class->toArray();
            $class_next["date_start"] = Carbon::create($data['date'])->addDay();
            ClassModel::query()->create($class_next);
        }
        $class->delete();
        return response("OK", 200);
    }
}
