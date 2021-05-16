<?php

namespace App\School;

class SchoolClass
{
    private $teacher;
    protected $pupils = [];

    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    public function addPupil($pupil)
    {
        if ($pupil instanceof Pupil && !$pupil->isAdult() && $this->getCountPupils() < 20) {
            $this->pupils[] = $pupil;
            return true;
        }
        return false;
    }

    public function getCountPupils()
    {
        return count($this->pupils);
    }

    public function getPupilsOfClass() {
        return $this->pupils;
    }

    public function getTeacher() {
        return $this->teacher;
    }
}
