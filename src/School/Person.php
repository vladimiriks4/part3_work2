<?php

namespace App\School;

abstract class Person
{
    public $name;
    protected $age;

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    abstract public function __construct($name, $age);
}
