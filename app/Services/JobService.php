<?php


namespace App\Services;



use App\Http\DTO\JobDTO;
use App\Models\Job;
use App\Models\JobSkill;

class JobService
{

    public static function saveJob(JobDTO $jobDTO, array $skills)
    {
        $job = new Job();
        if(!static::checkIfJobIsSavedAlready($jobDTO->getTitle(), $jobDTO->getDescription()) &&
            $jobDTO->getTitle() && $jobDTO->getCompany()){
            $job['title'] = $jobDTO->getTitle() ?? "";
            $job['type'] = $jobDTO->getType() ?? "";
            $job['description'] = $jobDTO->getDescription() ?? "";
            $job['salary_min'] = $jobDTO->getSalaryMin() ?? "";
            $job['salary_max'] = $jobDTO->getSalaryMax() ?? "";
            $job['category_id'] = 100;
            $job['company_id'] = CompanyService::getCompanyId($jobDTO->getCompany());
            $job['rating'] = $jobDTO->getRating() ?? "";
            $job['source'] = $jobDTO->getSource() ?? "";
            $job->save();

            foreach ($skills as $skill){
                $j_skill = new JobSkill();
                $j_skill['job_id'] = $job['id'];
                $j_skill['skill_id'] = SkillService::getSkillId($skill);
                $j_skill->save();
            }
        }
    }

    public static function checkIfJobIsSavedAlready($title, $description): bool
    {
        return count(Job::where(['title' => $title], ['description' => $description])->get()) > 0;
    }
}
