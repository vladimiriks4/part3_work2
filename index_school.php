<?php

require_once 'bootstrap.php';

use App\School\Pupil;
use App\School\Teacher;
use App\School\SchoolClass;
use App\School\School;

function manyPupil($count, $name)
{
    $people = [];
    for ($i=0; $i < $count; $i++) {
        $people[] = [
            "name" => $name . $i,
            "age" => rand(7, 20)
        ];
    }
    return $people;
}

function addManyPupilTo($arrPerson, $object)
{
    foreach ($arrPerson as $person) {
        if (method_exists($object, 'addPupil')){
            $object->addPupil(new Pupil($person["name"], $person["age"]));
        } else {
            $object->addPerson(new Pupil($person["name"], $person["age"]));
        }
    }
}


$teacher1 = new Teacher('Tanya', 58);
$teacher2 = new Teacher('Harry', 74);
$teacher3 = new Teacher('Roy', 33);

$superclass1 = new SchoolClass($teacher1);
$superclass3 = new SchoolClass($teacher3);

addManyPupilTo(manyPupil(12, 'Smith'), $superclass3);//roy

$superclass1->addPupil(new Pupil("aa", 11));
$superclass1->addPupil(new Pupil("bb", 9));
$superclass1->addPupil(new Pupil("cc", 7));
$superclass1->addPupil(new Pupil("dd", 5));

$superclass3->addPupil(new Pupil("Lam", 12));
$superclass3->addPupil(new Pupil("Pam", 13));
$superclass3->addPupil(new Pupil("Ram", 100));
$superclass3->addPupil(new Pupil("Ham", 15));

$mySchool = new School();

$mySchool->addClass($superclass1);
$mySchool->addClass($superclass3);

$mySchool->addPerson($teacher2);

$mySchool->addPerson(new Pupil("Sam", 10));
$mySchool->addPerson(new Pupil("Jam", 11));
addManyPupilTo(manyPupil(35, 'Sean'), $mySchool);

echo '<pre>';
var_dump($mySchool);
echo '<hr><hr>';
echo $mySchool->personsInSchoolCount();
