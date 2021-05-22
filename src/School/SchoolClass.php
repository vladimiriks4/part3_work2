<?php

namespace App\School;

class SchoolClass
{
    private $teacher;
    protected array $pupils = [];

    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @return int
     */
    public function addPupil(Pupil $pupil) :int
    {
        if ($pupil->isAdult()) {
            return 4;
        }
        if ($this->getCountPupils() > 20) {
            return 3;
        }
        $this->pupils[] = $pupil;
        return 2;
    }

    /**
     * @return int
     */
    public function getCountPupils() :int
    {
        return count($this->pupils);
    }

    /**
     * @return array
     */
    public function getPupilsOfClass() :array
    {
        return $this->pupils;
    }

    /**
     * @return object
     */
    public function getTeacher() :object
    {
        return $this->teacher;
    }
}
