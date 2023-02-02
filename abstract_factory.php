<?php

class Samochod

{
    function construct()
    {
        $this->marka = NULL;
        $this->model = NULL;
        $this->color = NULL;
        $this->pojemnosc = 0.0;
        $this->moc = 0;
    }
    private $marka;
    private $model;
    private $color;
    private $pojemnosc;
    private $moc;
    public function Samochod($marka, $model, $color, $pojemnosc, $moc)
    
    {
        $local_this = new Samochod();
        $local_this->marka = $marka;
        $local_this->model = $model;
        $local_this->color = $color;
        $local_this->pojemnosc = $pojemnosc;
        $local_this->moc = $moc;
        return $local_this;
    }
}

class FabrykaSamochodowAudiImpl
{
    function construct(){}
    
    public function FabrykaSamochodowAudiImpl()
    
    {
        $local_this = new FabrykaSamochodowAudiImpl();
        return $local_this;
    }
    
    public  function stworzSamochod()
    
    {
        return Samochod::Samochod("Audi", "Q8", "złoty", 1.9, 110);
    }
}

class FabrykaSamochodowBMWImpl
{
    function construct(){}
    
    public function FabrykaSamochodowBMWImpl()
    
    {
        $local_this = new FabrykaSamochodowBMW();
        return $local_this;
    }
    
    public function stworzSamochod()
    
    {
        return Samochod::Samochod("BMW", "X5", "zielony", 2.0, 150);
    }
}

class FabrykaSamochodowMazda
{
    function construct(){}

    public function FabrykaSamochodowMazda()
    
    {
        $local_this = new FabrykaSamochodowMazda();
        return $local_this;
    }
    
    public function stworzSamochod()
    {
        return Samochod::Samochod("Mazda", "RS6", "inny", 1.6, 120);
    }
}

?>
----------
wrong code:

<?php

class Samochod
{
    function __construct()
    {
        $this->marka = NULL;
        $this->model = NULL;
        $this->color = NULL;
        $this->pojemnosc = 0.0;
        $this->moc = 0;
        $this->audi = NULL;
        $this->bwm = NULL;
        $this->mazda = NULL;
    }
    
    private $marka;
    private $model;
    private $color;
    private $pojemnosc;
    private $moc;
    public static function Samochod($marka, $model, $color, $pojemnosc, $moc)
    
    {
        $local_this = new Samochod();
        $local_this->marka = $marka;
        $local_this->model = $model;
        $local_this->color = $color;
        $local_this->pojemnosc = $pojemnosc;
        $local_this->moc = $moc;
        return $local_this;
    }

    public $audi = Samochod::Samochod("Audi", "Q8", "złoty", 1.9, 110);
    public $bwm = Samochod::Samochod("BMW", "X5", "zielony", 2.0, 150);
    public $mazda = Samochod::Samochod("Mazda", "RS6", "inny", 1.6, 120);
}

?>
