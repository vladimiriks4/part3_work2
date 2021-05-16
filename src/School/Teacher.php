<?php

namespace App\School;

class Teacher extends Person
{
    private $experience;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = (int) $age;
        $this->experience = $this->age - 18;
    }

    public function getExperience()
    {
        return $this->experience;
    }
}
