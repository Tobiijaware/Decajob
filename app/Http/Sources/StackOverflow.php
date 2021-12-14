<?php

namespace App\Http\Sources;

use App\Http\DTO\CompanyDTO;
use App\Http\DTO\DataDTO;
use App\Http\DTO\JobDTO;

class StackOverflow extends Goutte
{

    function getUrl(): string
    {
        return 'https://stackoverflow.com/jobs';
    }

    public function scrapper(): array
    {
        $page = $this->connectGoutte();

        $data = [];

        try{
            $data = $page->filter('.listResults .js-result')->each(function ($item) {

                $dataDTO = new DataDTO();

                $location = $item->filter('.fl1 h3 span')->each(function ($val) {
                    return $val->text();
                });
                $jobInfo =  $item->filter('.fs-caption li')->each(function ($val) {
                    return $val->text();
                });


                foreach ($jobInfo as $info){
                    if($info == "Remote" || $info == "Paid relocation"){
                        $data['type'] = $info;
                    }elseif (str_ends_with($info, "k")){
                        $data['price'] = $info;
                    }
                }


                //Set Skill
                $skills = $item->filter('.fl1 .gs4 a')->each(function ($val) {
                    return $val->text();
                });
                $skillsArray = $this->checkAndProcessSkills($skills);


                //Set Job
                $job = new JobDTO();

                $job->setTitle($item->filter('.fl1 h2 a')->text());
                $job->setType($data['type'] ?? "");
                $job->setCompany($location[0]);
                if(isset($data['price'])){
                    $sal_min = explode("–", $data['price'])[0];
                    $sal_max = explode("–", $data['price'])[1];
                    $job->setSalaryMin(ltrim(rtrim($sal_min, "k"), "€"));
                    $job->setSalaryMax(rtrim($sal_max, "k"));
                }
                $job->setSource("StackOverflow");

                $jobsArray[] = $job;


                //Set Company
                $company = new CompanyDTO();

                $company->setLogoUrl($item->filterXpath('//img')->extract(array('src'))[0] ?? "");
                $company->setName($location[0]);
                $company->setLocation($location[1]);
                $company->setWebsiteUrl("https://stackoverflow.com".$item->filter('.fl1 h2 a')->extract(array('href'))[0]);

                $companiesArray[] = $company;

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
