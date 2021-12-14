<?php


namespace App\Contracts;


use App\Http\DTO\DataDTO;

interface IJob
{
    public function scrapper(): array;
}
