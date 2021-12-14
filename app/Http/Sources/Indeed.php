<?php

namespace App\Http\Sources;


use App\Http\DTO\CompanyDTO;
use App\Http\DTO\DataDTO;
use App\Http\DTO\JobDTO;

class Indeed extends Goutte
{
    function getUrl(): string
    {
        return 'https://ng.indeed.com/software-engineer-jobs';
    }

    public function scrapper(): array
    {
        $page = $this->connectGoutte();

        $data = [];

        try{
            $data = $page->filter('#pageContent .tapItem')->each(function ($item) {
                $dataDTO = new DataDTO();


                //Set Job
                $job = new JobDTO();
                $job->setTitle($item->filter('.job_seen_beacon .singleLineTitle h2')->text());
                $job->setDescription(implode("\n", $item->filter('.slider_list .slider_item .heading6 li')->each(function ($val) {
                    return $val->text();
                })));
                $job->setCompany($item->filter('.job_seen_beacon .company_location .companyName')->text());
                $job->setSource("Indeed");

                $jobsArray[] = $job;

                //Set Company
                $company = new CompanyDTO();
                $company->setName($item->filter('.job_seen_beacon .company_location .companyName')->text());
                $company->setLocation($item->filter('.job_seen_beacon .company_location .companyLocation')->text());
                $company->setWebsiteUrl("https://ng.indeed.com".$item->extract(array('href'))[0]);
                $companiesArray[] = $company;

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
