<?php

namespace App\School;

class School
{
    protected array $persons = [];
    protected array $classes = [];

    public function addPerson(Person $person): void
    {
        $this->persons[] = $person;
    }

    public function addClass(SchoolClass $schoolClass): void
    {
        $this->classes[] = $schoolClass;
    }

    public function personsInSchoolCount(): int
    {
        $count = count($this->persons);
        foreach ($this->classes as $class) {
            $count += 1 + $class->getCountPupils();
        }
        return $count;
    }
}
