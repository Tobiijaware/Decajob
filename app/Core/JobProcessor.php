<?php


namespace App\Core;


class JobProcessor
{

    public static function process(array $sources)
    {
        foreach ($sources as $source){
            $singleJobProcessor = new SingleJobProcessor($source);
            $singleJobProcessor->processSkills();
            $singleJobProcessor->processCompanies();
            $singleJobProcessor->processJobs();
        }
    }
}



