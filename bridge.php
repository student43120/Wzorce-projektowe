<?php

$zwierzę = [
    new konikMorski(),
    new foka(),
    new delfin(),
    new pies(),
    new kot(),
    new koń(),
];

foreach ($zwierzę as $animal) {
    if ($animal instanceof animaloceanType) {
        echo "{$animal-> getName()} żyje w wodzie {$animal->animalType('słonej')}";
    } else {
        echo "{$animal-> getName()} żyje na lądzie i ma {$animal->getnumberOfLegs()} + ('nogi')";
    }
}
interface zwierzę
{
    function getName(): string;
    function getOcean(): bool;
    function getLand(): bool;
}
class delfin extends animaloceanType
{
  
    public function getName(): string
    {
        return 'delfin';
    }
}

class kot extends  animalLand
{
  
    public function getName(): string
    {
        return 'kot';
    }
}

class foka extends animaloceanType
{
    
    public function getName(): string
    {
        return 'foka';
    }
}

class koń extends  animalLand
{
   
    public function getName(): string
    {
        return 'koń';
    }
}

class konikMorski extends animaloceanType
{
 
    public function getName(): string
    {
        return 'konikMorski';
    }
}

abstract class animalLand implements zwierzę
{
    public function getOcean(): bool
    {
        return false;
    }

    public function getLand(): bool
    {
        return true;
    }

    public function getnumberOfLegs(): int
    {
        return 4;
    }
}

abstract class animaloceanType implements zwierzę
{
    public function getOcean(): bool
    {
        return true;
    }

    public function getLand(): bool
    {
        return false;
    }

    public function animalType($oceanType)
    {
        return $oceanType;
    }
}

?>

__________________________________________________________________

Wrong code:

<?php
    class Animal
    {
        private $name;
        private $oceanType;
        private $numberOfLegs;
        private $land;
        private $animalType;


        function __construct($name,$oceanType, $numberOfLegs, $land, $animalType = null)
        {
            $this->name = $name;
            $this->oceanType = $oceanType;
            $this->numberOFLegs = $numberOFLegs;
            $this->land = $land;
            $this->animalType = $animalType;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals (animals_animalType, name, oceanType, numberOFLegs, land) VALUES (
                {$this->getanimalsanimalType()},
                '{$this->getName()}',
                '{$this->getoceanType()}',
                '{$this->getnumberOFLegs()}'");
            $this->animalType = $GLOBALS['DB']->insertType();
        }

        function removeItem()
        {
            $GLOBALS['DB']->exec("DELETE FROM animals WHERE animalType = {$this->getanimalType()};");
        }

    
        static function getAll()
        {
            $animals = array();
            $all_animals = $GLOBALS['DB']->query("SELECT * FROM animals");
            foreach ($all_animals as $animal) {
                $animals_animalType = $animal['animals_animalType'];
                $name = $animal['name'];
                $oceanType = $animal['oceanType'];
                $numberOFLegs = $animal['numberOFLegs'];
                $land = $animal['land'];
                $animalType = $animal['animalType'];
                $new_animal = new Animal($animals_animalType, $name, $oceanType, $numberOFLegs, $land);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM animals;");
        }



        function getanimalsanimalType()
        {
            return $this->animals_animalType;
        }
        function getName()
        {
            return $this->name;
        }
        function getoceanType()
        {
            return $this->oceanType;
        }
        function getnumberOFLegs()
        {
            return $this->numberOFLegs;
        }
        function getland()
        {
            return $this->land;
        }
        function getanimalType()
        {
            return $this->animalType;
        }

    }
 ?>