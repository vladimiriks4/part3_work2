<?php

namespace App\School;

class School
{
    protected array $persons = [];
    protected array $classes = [];

    /**
     * @return int
     */
    public function addPerson(Person $person) :int
    {
        if (method_exists($person, 'getExperience')) {
            $this->addClass(new SchoolClass($person));
            return 1;
        }
        foreach ($this->classes as $classForPupil) {
            $infoKey = $classForPupil->addPupil($person);
            if ($infoKey == 2) {
                $this->persons[] = $person;
                return $infoKey;
            }
            if ($infoKey != 3) {
                return $infoKey;
            }
        }
        return 3;
    }

    /**
     * @return void
     */
    public function addClass(SchoolClass $schoolClass) :void
    {
        $this->classes[$schoolClass->getTeacher()->getName()] = $schoolClass;
        $this->persons['Teacher'][] = $schoolClass->getTeacher();
        foreach ($schoolClass->getPupilsOfClass() as $pupil) {
            $this->persons[] = $pupil;
        }
    }

    /**
     * @return int
     */
    public function personsInSchoolCount() :int
    {
        return count($this->persons);
    }
}
