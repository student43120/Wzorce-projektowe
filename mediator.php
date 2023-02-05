<?php
$mediator = new Mediator();

$theBiggestLight = new Light('TheBigOne');
$smallLight = new Light('OtherLights');

$mediator->lightIndicate($theBiggestLight);
$mediator->lightIndicate($smallLight);

$turnOnLight = new TurnOnAllLights($mediator);
$turnOnLight->execute();

interface Command
{
    public function execute();
}

interface LightInterface
{
    public function lightSwitcher();
    public function on();
    public function off();
}

class Mediator
{
    private $Lights = [];

    public function lightIndicate(Light $Light)
    {
        array_push($this->Lights, $Light);
    }

    public function turnOnLight()
    {
        foreach ($this->Lights as $Light)
        {
            if ( !$Light->itIsLit)
            {
                $Light->lightSwitcher();
            }
        }
    }

    public function turnOffLight()
    {
        foreach ($this->Lights as $Light)
        {
            if ( $Light->itIsLit )
            {
                $Light->lightSwitcher();
            }
        }
    }

}

class Light implements LightInterface
{
    public $itIsLit = false;
    public $place;

    public function __construct(string $place)
    {
        $this->place = $place;
    }

    public function lightSwitcher()
    {
        if ( $this->itIsLit) {
            $this->off();
            $this->itIsLit = false;
        } else {
            $this->on();
            $this->itIsLit = true;
        }
    }

    public function on()
    {
        echo $this->place . ' door is Lighted. ';
    }

    public function off()
    {
        echo $this->place . ' door is unLighted. ';
    }
}

class TurnOffAllLights implements Command
{
    private $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function execute()
    {
        $this->mediator->turnOffLight();
    }
}

class TurnOnAllLights implements Command
{
    private $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function execute()
    {
        $this->mediator->turnOnLight();
    }
}

?>

___________________________________________________________________________________________
Wrong code:

<?php
$lightStatus = array (
    'on' => array('lightStatusOn', 'lightStatusOnForAll'),
    'off' => array('lightStatusOff', 'lightStatusOffForAll'),
);


foreach ($lightStatus as $key => $values) {
    switch ($key) { 
        case 'on' :
            $on = 'lightStatusOn';
            break;
        case 'onForAll' :
            $on = 'lightStatusOnForAll';
            break;
        case 'off' :
            $off = 'lightStatusOff';
            break;
         case 'offForAll' :
             $off = 'lightStatusOffForAll';
            break;
      }

}

