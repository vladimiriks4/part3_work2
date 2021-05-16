<?php

namespace App\School;

class Pupil extends Person
{

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = (int) $age;
    }

    public function isAdult()
    {
        return $this->getAge() > 17;
    }
}
