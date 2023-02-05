<?php

abstract class healthChecker
{
    protected $doctor;

    public abstract function check(patientWellBeing $patient);

    public function doctor(healthChecker $doctor)
    {
        $this->doctor = $doctor;
    }

    public function next(patientWellBeing $patient)
    {
        if ($this->doctor) {
            $this->doctor->check($patient);
        }
    }
}

class Stomach extends healthChecker
{
    public function check(patientWellBeing $patient)
    {
        if (!$patient->patientComfort) {
            echo "In stomach" + $patient +"don't feel any pain";
        }

        $this->next($patient);
    }
}

class Chest extends healthChecker
{

    public function check(patientWellBeing $patient)
    {
        if (!$patient->patientChestpain) {
            echo "in Chest we don't see any changes \n";
        }

        $this->next($patient);
    }
}

class Head extends healthChecker
{

    public function check(patientWellBeing $patient)
    {
        if (!$patient->patientHeadPain) {
            echo "Head wasn't checked \n";
        }

        $this->next($patient);
    }
}

class patientWellBeing
{
    public $patientHeadPain = true;
    public $patientComfort = true;
    public $patientChestpain = false;
}

$Stomach  = new Stomach();
$Chest = new Chest();
$Head  = new Head();

$Stomach->doctor($Chest);
$Chest->doctor($Head);

$Stomach->check(new patientWellBeing());