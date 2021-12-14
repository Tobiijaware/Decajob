<?php


namespace App\Contracts;


interface IJobRegistry
{
    public static function getJobSources(): array;
}
