<?php

namespace App\School;

class Pupil extends Person
{
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function isAdult(): bool
    {
        return $this->getAge() >= ADULT_AGE;
    }
}
