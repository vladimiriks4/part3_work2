<?php

require_once 'bootstrap.php';

use App\School\Pupil;
use App\School\Teacher;
use App\School\SchoolClass;
use App\School\School;

$info = [
    '1' => 'принят новый teacher и создан новый класс',
    '2' => 'принят новый pupil',
    '3' => 'все классы заполненны. дождитесь формирования нового класса',
    '4' => 'этот человек не подходит для школы',
];
$log = '';

function manyPupil(int $count, string $name) :array
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

function showMessage(string $item, string $key, array $info) :void
{
    if($item) {
        echo $info[$item] . '<br>';
    }
}

function fromKeysToMessage(string $log, array $info) :void
{
    $log = rtrim($log);
    $arrayKeys = explode(',', $log);
    array_walk($arrayKeys, 'showMessage', $info);
}

function addManyPupilTo(array $arrPerson, object $object) :string
{
    $log = '';
    foreach ($arrPerson as $person) {
        if (method_exists($object, 'addPupil')){
            $infoKey = $object->addPupil(new Pupil($person["name"], $person["age"]));
            $log .= $infoKey . ',';
        } else {
            $infoKey = $object->addPerson(new Pupil($person["name"], $person["age"]));
            $log .= $infoKey . ',';
        }
    }
    return $log;
}


$teacher1 = new Teacher('Tanya', 58);
$teacher2 = new Teacher('Harry', 74);
$teacher3 = new Teacher('Roy', 33);

$superclass1 = new SchoolClass($teacher1);
$superclass3 = new SchoolClass($teacher3);

$log .= addManyPupilTo(manyPupil(12, 'Smith'), $superclass3);//roy

$log .= $superclass1->addPupil(new Pupil("aa", 11)) . ',';
$log .= $superclass1->addPupil(new Pupil("bb", 9)) . ',';
$log .= $superclass1->addPupil(new Pupil("cc", 7)) . ',';
$log .= $superclass1->addPupil(new Pupil("dd", 5)) . ',';

$log .= $superclass3->addPupil(new Pupil("Lam", 12)) . ',';
$log .= $superclass3->addPupil(new Pupil("Pam", 13)) . ',';
$log .= $superclass3->addPupil(new Pupil("Ram", 100)) . ',';
$log .= $superclass3->addPupil(new Pupil("Ham", 15)) . ',';

$mySchool = new School();

$mySchool->addClass($superclass1);
$mySchool->addClass($superclass3);

$log .= $mySchool->addPerson($teacher2) . ',';
$log .= $mySchool->addPerson(new Pupil("Sam", 10)) . ',';
$log .= $mySchool->addPerson(new Pupil("Jam", 11)) . ',';
$log .= addManyPupilTo(manyPupil(65, 'Sean'), $mySchool);

fromKeysToMessage($log, $info);
echo '<hr>';
echo '<pre>';
var_dump($mySchool);
echo '<hr><hr>';
echo $mySchool->personsInSchoolCount();
