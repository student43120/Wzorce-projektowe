<?php

class PlatformaSteam
{
    function __construct(){
    }
    public static function PlatformaSteam()
    {
        $local_this = new PlatformaSteam();
        return $local_this;
    }
    public static function main(&$args)
    {
        echo "Steam","\n";
        echo "Terminal obslugi Steam","\n";
    }
}class KontoId
{
    function __construct(){
        $this->identyfikator = 0;
        $this->punktyNaKoncie = 0;
    }
    public static function KontoId()
    {
        $local_this = new KontoId();
        return $local_this;
    }
    private $identyfikator = 654;
    private $punktyNaKoncie = 6540;
    public function getIdentyfikator()
    {
        return $this->identyfikator;
    }
    public function getWartoscKonta($identyfikator)
    {
        return $this->punktyNaKoncie;
    }
    public function isKontoAktywne($identyfikatorToCheck)
    {
        if ($identyfikatorToCheck == $this->getIdentyfikator())
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}class IdentyfikatorCheck
{
    function __construct(){
        $this->potwierdzenieLogowania = 0;
    }
    public static function IdentyfikatorCheck()
    {
        $local_this = new IdentyfikatorCheck();
        return $local_this;
    }
    private $potwierdzenieLogowania = 321654;
    public function getKodDostepu()
    {
        return $this->potwierdzenieLogowania;
    }
    public function isPoprawny($kodDostepuToCheck)
    {
        if ($kodDostepuToCheck == $this->getKodDostepu())
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}class PrzyznajGre
{
    function __construct(){
        $this->cenaGryPunkty = 0.0;
        $this->kontoId = NULL;
    }
    public static function PrzyznajGre()
    {
        $local_this = new PrzyznajGre();
        return $local_this;
    }
    private $cenaGryPunkty = 2500;
    private $kontoId;
    public function getPunkty()
    {
        return $this->cenaGryPunkty;
    }
    public function pobierzPunktyKonto($punktyPobrane)
    {
        $wartosc = $this->kontoId->getWartoscKonta(234);
        $wartosc -= $punktyPobrane;
        return $wartosc;
    }
    public function isWystarczajacaIloscPunktow($punktyPobrane)
    {
        if ($punktyPobrane > $this->getPunkty())
        {
            echo "Error: :( Nie masz wystarczajacych srodkow","\n";
            echo "Stan punktow: " . strval($this->pobierzPunktyKonto(768)),"\n";
            return false;
        }
        else 
        {
            echo "Stan konta" . strval($this->pobierzPunktyKonto(768)),"\n";
            return true;
        }
    }
    class SteamFacade
    {
        function __construct(){
            $this->numerKonta = 0;
            $this->identyfikator = 0;
            $this->kontoId = NULL;
            $this->identyfikatorCheck = NULL;
            $this->przyznajGre = NULL;
            $this->platformaSteam = NULL;
        }
        private $numerKonta;
        private $identyfikator;
        public $kontoId;
        public $identyfikatorCheck;
        public $przyznajGre;
        public $platformaSteam;
        public static function SteamFacade($newNumerKonta, $newIdentyfikator)
        {
            $local_this = new SteamFacade();
            $this->numerKonta = $newNumerKonta;
            $this->identyfikator = $newIdentyfikator;
            $this->platformaSteam = PlatformaSteam::PlatformaSteam();
            $this->kontoId = KontoId::KontoId();
            $this->identyfikatorCheck = IdentyfikatorCheck::IdentyfikatorCheck();
            $this->przyznajGre = PrzyznajGre::PrzyznajGre();
            return $local_this;
        }
        public function getKontoId()
        {
            return $this->numerKonta;
        }
        public function getIdentyfikator()
        {
            return $this->identyfikator;
        }
        public function przyznajGre($punktyZaGre)
        {
            if ($this->kontoId->isKontoAktywne($this->getIdentyfikator()))
            {
                echo "Gra na twoim koncie","\n";
            }
            else 
            {
                echo "Nie mozemy przyznac ci gry","\n";
            }
        }
    }
}
PlatformaSteam::main($argv);
<?php