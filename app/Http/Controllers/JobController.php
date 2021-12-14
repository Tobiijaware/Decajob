<?php

namespace App\Http\Controllers;


use App\Http\DTO\JobDTO;
use App\Models\Job;
use App\Models\JobSkill;
use Illuminate\Support\Facades\Cache;
use Redis;
use Illuminate\Support\Facades\DB;


class JobController extends Controller
{

    public function index()
    {

        $result = Cache::remember('jobs', 60, function () {
            return Job::paginate(10);
        });

        return view('home',[
            'jobs' => $result
        ]);
    }

}
