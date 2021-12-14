<?php


namespace App\Core;

use App\Contracts\IJob;
use App\Contracts\IJobRegistry;

class JobRegistry implements IJobRegistry
{
    private static array $jobSources = [];

    public static function setJobSources(IJob $jobSource): void
    {
        array_push(self::$jobSources, $jobSource->scrapper());
    }

    public static function getJobSources(): array
    {
        return self::$jobSources;
    }
}
