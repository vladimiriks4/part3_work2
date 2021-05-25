<?php

namespace App\School;

class Teacher extends Person
{
    private int $experience;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->experience = $this->age - ADULT_AGE;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }
}
