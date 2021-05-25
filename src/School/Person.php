<?php

namespace App\School;

abstract class Person
{
    protected string $name;
    protected int $age;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    abstract public function __construct(string $name, int $age);
}
