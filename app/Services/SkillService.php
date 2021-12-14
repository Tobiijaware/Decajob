<?php


namespace App\Services;


use App\Models\Skill;

class SkillService
{
    public static function saveSkill(string $skill)
    {
        $s = new Skill();
        if(!static::checkIfSkillIsSavedAlready($skill)){
            $s['name'] = $skill;
            $s->save();
        }
    }

    public static function checkIfSkillIsSavedAlready($value): bool
    {
        return count(Skill::where(['name' => $value])->get()) > 0;
    }

    public static function getSkillId($value): int
    {
        $skill = Skill::where(['name' => $value])->get();
        if(count($skill) > 0) return  $skill[0]->id;
        return -1;
    }
}
