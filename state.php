<?php
namespace Car;

use doorOpen;
use Stop;

class Car
{
    protected $state;
    
    public function getState(): Carstate
    {
        return $this->state;
    }

    public function setState(CarstateInterface $state): void
    {
        $this->state = $state;
    }
    
    public function __construct()
    {
        $this->setState(new Stop());
    }
    
    public function isdoorOpen(): bool
    {
        return $this->state instanceof doorOpen;
    }
    
    public function doorOpen(): void
    {
        $this->setState($this->state->doorOpen());
    }
    
    public function doorClose(): void
    {
        $this->setState($this->state->doorClose());
    }
    
    public function drive(): void
    {
        $this->setState($this->state->drive());
    }
    
    public function stop(): void
    {
        $this->setState($this->state->stop());
    }
}

//Car state

use carExeption;
use doorClose;
use Drive;
use doorOpen;
use Stop;

class CarState implements CarStateInterface
{
    public function doorClose(): doorClose
    {
        throw new carExeption();
    }

    public function drive(): Drive
    {
        throw new carExeption();
    }

    public function doorOpen(): doorOpen
    {
        throw new carExeption();
    }
    
    public function stop(): Stop
    {
        throw new carExeption();
    }
}


//State Interface

use doorClose;
use Drive;
use doorOpen;
use Stop;

interface CarStateInterface
{
    public function doorOpen(): doorOpen;
    public function doorClose(): doorClose;
    public function drive(): Drive;
    public function stop(): Stop;
}


//Exeption

<?php
namespace Exception;

class carExeption extends Exeptions
{
}

?>
______________________________________________________________________________________________________
BEFORE:

<?php
$carActions = "carActions";

switch ($carActions) {
  case "doorOpen":
    echo "Door is open";
    break;
  case "doorClose":
    echo "Door was closed";
    break;
  case "drive":
    echo "Car is starting";
    break;
  case "stop":
    echo "Car is stopping";
    break;
  case "Exeption":
    echo "Car is unavaible";
    break;

  default:
    echo "Car is available";
}
?> 




