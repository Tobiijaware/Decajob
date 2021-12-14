<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','logo_url','website_url','location','address'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
