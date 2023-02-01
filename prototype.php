<?php

class Main
{
    function __construct(){
    }
    public static function Main()
    {
        $local_this = new Main();
        return $local_this;
    }
    public static function main(&$args)
    {
        $creatureMaker = CreaturesRegister::CreaturesRegister();
        $creatureMaker->addCreature(Minotaur::Minotaur("Wojowniku! Na Twojej drodze staje Minotaur!", "Minotaur", 100, 50));
        $creatureMaker->addCreature(Kappa::Kappa("Wojowniku! Na Twojej drodze staje Kappa!", "Kappa", 60, 70));
        $creature = $creatureMaker->getCreature();
        $clonedCreature = $creature->makeCopy();
        echo "-------------------------------------------------------","\n";
        print_r($creature);
        echo "-------------------------------------------------------","\n";
        print_r($clonedCreature);
        echo "-------------------------------------------------------","\n";
        echo "Kreatura Hashcode: " . strval(System.identityHashCode(System.identityHashCode($creature))),"\n";
        echo "Clone Hashcode: " . strval(System.identityHashCode(System.identityHashCode($clonedCreature))),"\n";
        echo "-------------------------------------------------------","\n";
        echo "Lista potworow: ","\n";
        .map(Creature::getName).forEach(java.io.PrintStream@2c8d66b2::println);
        echo "-------------------------------------------------------","\n";
    }
}interface Creature extends Cloneable
{
    function makeCopy();
    function getAttack();
    function getName();
    function toString();
}class CreaturesRegister
{
    function __construct(){
        $this->listOfCreatures = NULL;
    }
    public static function CreaturesRegister()
    {
        $local_this = new CreaturesRegister();
        return $local_this;
    }
    public $listOfCreatures = array();
    public function addCreature($creature)
    {
        array_push($this->listOfCreatures,$creature);
    }
    function getListOfCreatures()
    {
        return $this->listOfCreatures;
    }
    public function getCreature()
    {
        return $this->listOfCreatures[$this->getRandomIndex()];
    }
    public function getRandomIndex()
    {
        $round = "RandomInput";
        return rand(0,count($this->listOfCreatures));
    }
}class Kappa implements Creature
{
    function __construct(){
        $this->describe = NULL;
        $this->species = NULL;
        $this->live = 0;
        $this->strength = 0;
        $this->attacks = NULL;
        $this->attack = NULL;
    }
    public $describe;
    public $species;
    public $live;
    public $strength;
    public $attacks = array("Ogon","Szponiaste płetwy","Krzyk");
    public $attack;
    public static function Kappa($describe, $species, $live, $strength)
    {
        $local_this = new Kappa();
        $local_this->describe = $describe;
        $local_this->species = $species;
        $local_this->live = $live;
        $local_this->strength = $strength;
        $local_this->attack = $this->getAttack();
        return $local_this;
    }
    public function getAttack()
    {
        return $this->attacks[$this->getNumber()];
    }
    public function getName()
    {
        return $this->species;
    }
    public function getNumber()
    {
        $round = "RandomInput";
        return rand(0,count($this->attacks));
    }
    public function makeCopy()
    {
        echo "Tworzony przeciwnik: Kappa","\n";
        $minotaurObject;
        try
        {
            $minotaurObject = (Kappa)$this->super->clone();
        } catch ( Exception $e) {
            throw new Exception($e);
        }
        return $minotaurObject;
    }
    public function toString()
    {
        return "KREATURA" . strval('\n') . "describe: " . $this->describe . strval('\n') . "species: " . $this->species . strval('\n') . "live: " . strval($this->live) . strval('\n') . "strength: " . strval($this->strength) . strval('\n') . "attack: " . $this->attack;
    }
}class Minotaur implements Creature
{
    function __construct(){
        $this->describe = NULL;
        $this->species = NULL;
        $this->live = 0;
        $this->strength = 0;
        $this->attacks = NULL;
        $this->attack = NULL;
    }
    public $describe;
    public $species;
    public $live;
    public $strength;
    public $attacks = array("Rogi","Kopyta","Ryk");
    public $attack;
    public static function Minotaur($describe, $species, $live, $strength)
    {
        $local_this = new Minotaur();
        $local_this->describe = $describe;
        $local_this->species = $species;
        $local_this->live = $live;
        $local_this->strength = $strength;
        $local_this->attack = $this->getAttack();
        return $local_this;
    }
    public function getAttack()
    {
        return $this->attacks[$this->getNumber()];
    }
    public function getName()
    {
        return $this->species;
    }
    public function getNumber()
    {
        $round = "RandomInput";
        return rand(0,count($this->attacks));
    }
    public function makeCopy()
    {
        echo "Tworzony przeciwnik: Minotaur","\n";
        $minotaurObject;
        try
        {
            $minotaurObject = (Minotaur)$this->super->clone();
        } catch ( Exception $e) {
            throw new Exception($e);
        }
        return $minotaurObject;
    }
    public function toString()
    {
        return "MINOTAUR" . strval('\n') . "describe: " . $this->describe . strval('\n') . "species: " . $this->species . strval('\n') . "live: " . strval($this->live) . strval('\n') . "strength: " . strval($this->strength) . strval('\n') . "attack: " . $this->attack;
    }
}
Main::main($argv);
?>