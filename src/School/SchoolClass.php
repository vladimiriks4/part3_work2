<?php

namespace App\School;

class SchoolClass
{
    private Teacher $teacher;
    protected array $pupils = [];

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function addPupil(Pupil $pupil): void
    {
        if (!$pupil->isAdult() || $this->fullClass()) {
            $this->pupils[] = $pupil;
        }
    }

    public function fullClass(): bool
    {
        return $this->getCountPupils() > MAX_COUNT_PUPIL;
    }

    public function getCountPupils(): int
    {
        return count($this->pupils);
    }
}
