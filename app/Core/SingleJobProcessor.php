<?php


namespace App\Core;



use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Services\CompanyService;
use App\Services\JobService;
use App\Services\SkillService;

class SingleJobProcessor
{

    private array $source;

    /**
     * SingleJobProcessor constructor.
     */
    public function __construct(array $source)
    {
        $this->source = $source;
    }

    public function processSkills()
    {
        foreach ($this->source as $s){

            $skills = $s->getSkills();

            if(count($skills) > 0){
                foreach ($skills as $skill){
                    SkillService::saveSkill($skill);
                }
            }
        }
    }

    public function processCompanies()
    {
        foreach ($this->source as $s){
            $companyDTO = $s->getCompanies();

            if(count($companyDTO) > 0){
                $company = $companyDTO[0];
                CompanyService::saveCompany($company);
            }
        }
    }

    public function processJobs()
    {
        foreach ($this->source as $s){
            $jobDTO = $s->getJobs();
            $skills = $s->getSkills();

            if(count($jobDTO) > 0){
                $jobDTO = $jobDTO[0];
                JobService::saveJob($jobDTO, $skills);
            }
        }
    }
}
