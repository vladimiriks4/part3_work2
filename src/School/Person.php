<?php

namespace App\School;

abstract class Person
{
    public string $name;
    protected int $age;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    abstract public function __construct(string $name, int $age);
}
