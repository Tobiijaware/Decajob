<?php


namespace App\Http\Sources;


use App\Contracts\IJob;
use App\Http\DTO\SkillDTO;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

abstract class Goutte implements IJob
{
    abstract function getUrl(): string;

    public function connectGoutte(): ?Crawler
    {
        $goutteClient = new Client(HttpClient::create(['timeout' => 60]));
        return $goutteClient->request('GET', $this->getUrl());
    }

    public function checkAndProcessSkills(array $skills): array
    {
        $skillsArray = [];
        if($skills){
            foreach ($skills as $s){
                if(strlen($s) > 0) {
                    $skill = new skillDTO();
                    $skill->setName((string)$s);
                    array_push($skillsArray,$s);
                }
            }
        }
        return $skillsArray;
    }
}
