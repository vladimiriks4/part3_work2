<?php

namespace App\School;

class School
{
    protected $persons = [];
    protected $classes = [];

    public function addPerson(Person $person)
    {
        if (method_exists($person, 'getExperience')) {
            $this->addClass(new SchoolClass($person));
            return 'принят новый teacher';
        } elseif(!$person->isAdult()) {
            foreach ($this->classes as $classForPupil) {
                if ($classForPupil->addPupil($person)) {
                    $this->persons['Pupil'][] = $person;
                    return '<hr>'.'принят новый pupil'.'<hr>';
                }
            }
            echo '<br>';
            echo 'все классы заполненны. дождитесь формирования нового класса';
            echo '<br>';
        } else {
            return 'Этот человек не подходит для школы';
        }
    }

    public function addClass(SchoolClass $schoolClass)
    {
        $this->classes[$schoolClass->getTeacher()->getName()] = $schoolClass;
        $this->persons['Teacher'][] = $schoolClass->getTeacher();
        foreach ($schoolClass->getPupilsOfClass() as $pupil) {
            $this->persons['Pupil'][] = $pupil;
        }
    }

    public function personsInSchoolCount()
    {
        return count($this->persons['Teacher']) + count($this->persons['Pupil']);
    }
}
