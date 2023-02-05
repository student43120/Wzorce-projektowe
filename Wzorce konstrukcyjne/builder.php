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
    protected static function main(&$args)
    {
        $fluffyStyleTeddyCat = FluffyTeddyCatBuilder::FluffyTeddyCatBuilder();
        $teddyCatMaker = TeddyCatMaker::TeddyCatMaker($fluffyStyleTeddyCat);
        $teddyCatMaker->makeTeddyCat();
        $firstTeddyCat = $teddyCatMaker->getTeddyCat();
        echo "TeddyCat Make","\n";
        echo "TeddyCat Head Type: " . $firstTeddyCat->getTeddyCatHead(),"\n";
        echo "TeddyCat Torso Type: " . $firstTeddyCat->getTeddyCatTorso(),"\n";
        echo "TeddyCat Tail Type: " . $firstTeddyCat->getTeddyCatTail(),"\n";
        echo "TeddyCat Paws Type: " . $firstTeddyCat->getTeddyCatPaws(),"\n";
        echo "TeddyCat Fur Type: " . $firstTeddyCat->getTeddyCatFur(),"\n";
        $sphinxStyleTeddyCat = SphinxTeddyCatBuilder::SphinxTeddyCatBuilder();
        $teddyCatMaker = TeddyCatMaker::TeddyCatMaker($sphinxStyleTeddyCat);
        $teddyCatMaker->makeTeddyCat();
        $secondTeddyCat = $teddyCatMaker->getTeddyCat();
        print("\n");
        echo "TeddyCat 2 Make","\n";
        echo "TeddyCat Head Type: " . $secondTeddyCat->getTeddyCatHead(),"\n";
        echo "TeddyCat Torso Type: " . $secondTeddyCat->getTeddyCatTorso(),"\n";
        echo "TeddyCat Tail Type: " . $secondTeddyCat->getTeddyCatTail(),"\n";
        echo "TeddyCat Paws Type: " . $secondTeddyCat->getTeddyCatPaws(),"\n";
        echo "TeddyCat Fur Type: " . $secondTeddyCat->getTeddyCatFur(),"\n";
    }
}class FluffyTeddyCatBuilder implements TeddyCatBuilder
{
    function __construct(){
        $this->teddyCat = NULL;
    }
    private $teddyCat;
    public static function FluffyTeddyCatBuilder()
    {
        $local_this = new FluffyTeddyCatBuilder();
        $local_this->teddyCat = TeddyCat::TeddyCat();
        return $local_this;
    }
    public function buildTeddyCatHead()
    {
        $this->teddyCat->setTeddyCatHead("Fluffy Head");
    }
    public function buildTeddyCatTorso()
    {
        $this->teddyCat->setTeddyCatTorso("Fluffy Torso");
    }
    public function buildTeddyCatTail()
    {
        $this->teddyCat->setTeddyCatTail("Fluffy Tail");
    }
    public function buildTeddyCatPaws()
    {
        $this->teddyCat->setTeddyCatPaws("Fluffy Paws");
    }
    public function buildTeddyCatFur()
    {
        $this->teddyCat->setTeddyCatFur("Fluffy Fur");
    }
    public function getTeddyCat()
    {
        return $this->teddyCat;
    }
}interface TeddyCatBuilder
{
    function buildTeddyCatHead();
    function buildTeddyCatTorso();
    function buildTeddyCatTail();
    function buildTeddyCatPaws();
    function buildTeddyCatFur();
    function getTeddyCat();
}class TeddyCat implements TeddyCatBody
{
    function __construct(){
        $this->teddyCatHead = NULL;
        $this->teddyCatTorso = NULL;
        $this->teddyCatTail = NULL;
        $this->teddyCatPaws = NULL;
        $this->teddyCatFur = NULL;
    }
    public static function TeddyCat()
    {
        $local_this = new TeddyCat();
        return $local_this;
    }
    private $teddyCatHead;
    private $teddyCatTorso;
    private $teddyCatTail;
    private $teddyCatPaws;
    private $teddyCatFur;
    public function setTeddyCatHead($head)
    {
        $this->teddyCatHead = $head;
    }
    public function getTeddyCatHead()
    {
        return $this->teddyCatHead;
    }
    public function setTeddyCatTorso($torso)
    {
        $this->teddyCatTorso = $torso;
    }
    public function getTeddyCatTorso()
    {
        return $this->teddyCatTorso;
    }
    public function setTeddyCatTail($tail)
    {
        $this->teddyCatTail = $tail;
    }
    public function getTeddyCatTail()
    {
        return $this->teddyCatTail;
    }
    public function setTeddyCatPaws($paws)
    {
        $this->teddyCatPaws = $paws;
    }
    public function getTeddyCatPaws()
    {
        return $this->teddyCatPaws;
    }
    public function setTeddyCatFur($fur)
    {
        $this->teddyCatFur = $fur;
    }
    public function getTeddyCatFur()
    {
        return $this->teddyCatFur;
    }
}interface TeddyCatBody
{
    function setTeddyCatHead($head);
    function setTeddyCatTorso($torso);
    function setTeddyCatTail($tail);
    function setTeddyCatPaws($paws);
    function setTeddyCatFur($fur);
}class SphinxTeddyCatBuilder implements TeddyCatBuilder
{
    function __construct(){
        $this->teddyCat = NULL;
    }
    private $teddyCat;
    public static function SphinxTeddyCatBuilder()
    {
        $local_this = new SphinxTeddyCatBuilder();
        $local_this->teddyCat = TeddyCat::TeddyCat();
        return $local_this;
    }
    public function buildTeddyCatHead()
    {
        $this->teddyCat->setTeddyCatHead("Sphinx Head");
    }
    public function buildTeddyCatTorso()
    {
        $this->teddyCat->setTeddyCatTorso("Sphinx Torso");
    }
    public function buildTeddyCatTail()
    {
        $this->teddyCat->setTeddyCatTail("Sphinx Tail");
    }
    public function buildTeddyCatPaws()
    {
        $this->teddyCat->setTeddyCatPaws("Sphinx Paws");
    }
    public function buildTeddyCatFur()
    {
        $this->teddyCat->setTeddyCatFur("");
    }
    public function getTeddyCat()
    {
        return $this->teddyCat;
    }
}class TeddyCatMaker
{
    function __construct(){
        $this->teddyCatBuilder = NULL;
    }
    private $teddyCatBuilder;
    public static function TeddyCatMaker($teddyCatBuilder)
    {
        $local_this = new TeddyCatMaker();
        $local_this->teddyCatBuilder = $teddyCatBuilder;
        return $local_this;
    }
    public function getTeddyCat()
    {
        return $this->teddyCatBuilder->getTeddyCat();
    }
    public function makeTeddyCat()
    {
        $this->teddyCatBuilder->buildTeddyCatHead();
        $this->teddyCatBuilder->buildTeddyCatTorso();
        $this->teddyCatBuilder->buildTeddyCatTail();
        $this->teddyCatBuilder->buildTeddyCatPaws();
        $this->teddyCatBuilder->buildTeddyCatFur();
    }
}
Main::main($argv);
?>

_______________________________________________________________________________________________________________________________________
Wrong  code:


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
        $firstTeddyCat = TeddyCat::TeddyCat();
        $firstTeddyCat->setTeddyCatHead("Fluffy Head");
        $firstTeddyCat->setTeddyCatTorso("Fluffy Toros");
        $firstTeddyCat->setTeddyCatTail("Fluffy Tail");
        $firstTeddyCat->setTeddyCatPaws("Fluffy Paws");
        $firstTeddyCat->setTeddyCatFur("Fluffy Fur");
        echo "TeddyCat Make","\n";
        echo "TeddyCat Head Type: " . $firstTeddyCat->getTeddyCatHead(),"\n";
        echo "TeddyCat Torso Type: " . $firstTeddyCat->getTeddyCatTorso(),"\n";
        echo "TeddyCat Tail Type: " . $firstTeddyCat->getTeddyCatTail(),"\n";
        echo "TeddyCat Paws Type: " . $firstTeddyCat->getTeddyCatPaws(),"\n";
        echo "TeddyCat Fur Type: " . $firstTeddyCat->getTeddyCatFur(),"\n";
        $secondTeddyCat = TeddyCat::TeddyCat();
        $secondTeddyCat->setTeddyCatHead("Sphinx Head");
        $secondTeddyCat->setTeddyCatTorso("Sphinx Toros");
        $secondTeddyCat->setTeddyCatTail("Sphinx Tail");
        $secondTeddyCat->setTeddyCatPaws("Sphinx Paws");
        $secondTeddyCat->setTeddyCatFur("");
        print("\n");
        echo "TeddyCat 2 Make","\n";
        echo "TeddyCat Head Type: " . $secondTeddyCat->getTeddyCatHead(),"\n";
        echo "TeddyCat Torso Type: " . $secondTeddyCat->getTeddyCatTorso(),"\n";
        echo "TeddyCat Tail Type: " . $secondTeddyCat->getTeddyCatTail(),"\n";
        echo "TeddyCat Paws Type: " . $secondTeddyCat->getTeddyCatPaws(),"\n";
        echo "TeddyCat Fur Type: " . $secondTeddyCat->getTeddyCatFur(),"\n";
    }
}class TeddyCat
{
    function __construct(){
        $this->teddyCatHead = NULL;
        $this->teddyCatTorso = NULL;
        $this->teddyCatTail = NULL;
        $this->teddyCatPaws = NULL;
        $this->teddyCatFur = NULL;
    }
    public static function TeddyCat()
    {
        $local_this = new TeddyCat();
        return $local_this;
    }
    private $teddyCatHead;
    private $teddyCatTorso;
    private $teddyCatTail;
    private $teddyCatPaws;
    private $teddyCatFur;
    public function setTeddyCatHead($head)
    {
        $this->teddyCatHead = $head;
    }
    public function getTeddyCatHead()
    {
        return $this->teddyCatHead;
    }
    public function setTeddyCatTorso($torso)
    {
        $this->teddyCatTorso = $torso;
    }
    public function getTeddyCatTorso()
    {
        return $this->teddyCatTorso;
    }
    public function setTeddyCatTail($tail)
    {
        $this->teddyCatTail = $tail;
    }
    public function getTeddyCatTail()
    {
        return $this->teddyCatTail;
    }
    public function setTeddyCatPaws($paws)
    {
        $this->teddyCatPaws = $paws;
    }
    public function getTeddyCatPaws()
    {
        return $this->teddyCatPaws;
    }
    public function setTeddyCatFur($fur)
    {
        $this->teddyCatFur = $fur;
    }
    public function getTeddyCatFur()
    {
        return $this->teddyCatFur;
    }
}
Main::main($argv);
?>


