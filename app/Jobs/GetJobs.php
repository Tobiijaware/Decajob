<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Core\JobProcessor;
use App\Core\JobRegistry;
use App\Http\Sources\Indeed;
use App\Http\Sources\Larajob;
use App\Http\Sources\StackOverflow;

class GetJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        JobRegistry::setJobSources(new Larajob());
        JobRegistry::setJobSources(new Indeed());
        JobRegistry::setJobSources(new StackOverflow());
        JobProcessor::process(JobRegistry::getJobSources());
    }
}
