<?php


namespace App\Services;


use App\Http\DTO\CompanyDTO;
use App\Models\Company;

class CompanyService
{
    public static function saveCompany(CompanyDTO $companyDTO)
    {
        $company = new Company();
        if(!static::checkIfCompanyIsSavedAlready($companyDTO->getName()) && $companyDTO->getName()){
            $company['name'] = $companyDTO->getName() ?? "";
            $company['logo_url'] = $companyDTO->getLogoUrl() ?? "";
            $company['website_url'] = $companyDTO->getWebsiteUrl() ?? "";
            $company['location'] = $companyDTO->getLocation() ?? "";
            $company['address'] = $companyDTO->getAddress() ?? "";
            $company->save();
        }
    }

    public static function checkIfCompanyIsSavedAlready($value): bool
    {
        return count(Company::where(['name' => $value])->get()) > 0;
    }

    public static function getCompanyId($value): int
    {
        $company = Company::where(['name' => $value])->get();
        if(count($company) > 0) return  $company[0]->id;
        return -1;
    }
}
