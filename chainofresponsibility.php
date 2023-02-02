<?php

abstract class healthChecker
{
    protected $successor;

    public abstract function check(patientStatus $patient);

    public function successor(healthChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(patientStatus $patient)
    {
        if ($this->successor) {
            $this->successor->check($patient);
        }
    }
}

class Stomach extends healthChecker
{
    public function check(patientStatus $patient)
    {
        if (!$patient->locked) {
            echo "In stomach" + $patient +"don't feel any pain";
        }

        $this->next($patient);
    }
}

class Chest extends healthChecker
{

    public function check(patientStatus $patient)
    {
        if (!$patient->lightOff) {
            echo "in Chest we don't see any changes \n";
        }

        $this->next($patient);
    }
}

class Head extends healthChecker
{

    public function check(patientStatus $patient)
    {
        if (!$patient->HeadOn) {
            echo "Head wasn't checked \n";
        }

        $this->next($patient);
    }
}

class patientStatus
{
    public $HeadOn = true;
    public $locked = true;
    public $lightOff = false;
}

$Stomach  = new Stomach();
$Chest = new Chest();
$Head  = new Head();

$Stomach->successor($Chest);
$Chest->successor($Head);

$Stomach->check(new patientStatus());