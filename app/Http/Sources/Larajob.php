<?php

namespace App\Http\Sources;

use App\Http\DTO\CompanyDTO;
use App\Http\DTO\DataDTO;
use App\Http\DTO\JobDTO;

class Larajob extends Goutte
{
    function getUrl(): string
    {
        return 'https://larajobs.com';
    }

    public function scrapper(): array
    {
        $page = $this->connectGoutte();

        $data = [];

        try{
            $data = $page->filter('.job-link')->each(function ($item) {

                $dataDTO = new DataDTO();


                //Set Skill
                $skills = $item->filter('.flex .border')->each(function ($skill) {
                    return $skill->text();
                });
                $skillsArray = $this->checkAndProcessSkills($skills);


                //Set Job
                $job = new JobDTO();

                $job->setTitle($item->filter('.job-wrap .details .description')->text());
                $job->setType($item->filter('.job-wrap .text-xs')->text());
                $job->setSource("Larajob");
                $job->setCompany($item->filter('.job-wrap .details h4')->text());

                $jobsArray[] = $job;


                //Set Company
                $company = new CompanyDTO();

                $company->setName($item->filter('.job-wrap .details h4')->text());
                if(count($item->filterXpath('//img')->extract(array('src'))) > 0){
                    $company->setLogoUrl("https://larajobs.com".$item->filterXpath('//img')->extract(array('src'))[0]);
                }
                $company->setLocation($item->filter('.job-wrap h4')->text());
                $company->setWebsiteUrl("https://larajobs.com".$item->extract(array('href'))[0]);
                $company->setLocation($item->filter('.job-wrap .text-xs')->text());
                $companiesArray[] =$company;

                $dataDTO->setSkills($skillsArray);
                $dataDTO->setJobs($jobsArray);
                $dataDTO->setCompanies($companiesArray);

                return $dataDTO;
            });
        }catch (\Exception $e){
            logger($e);
        }

        return $data;

    }
}
