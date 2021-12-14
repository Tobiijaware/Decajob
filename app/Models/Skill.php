<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    /**
     * The Users that belong to the Skill
     */

     public function users()
     {
         return $this->belongsToMany(User::class, 'skill_user');
     }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skills');
    }
}
