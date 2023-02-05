
<?php

abstract class candlePhoto
{
    public abstract function getProcess();
    public abstract function getColor();
    public abstract function getHeight();
    public abstract function getWidht();
    public abstract function loadPhoto();
    public abstract function getProcessEnd();

    final public function selectPhoto() 
    {
        echo $this->getProcess();

        for ($i = 0; $i < $this->getHeight(); $i++) {
            for ($j = 0; $j < $this->getWidht(); $j++) {
                echo $this->loadPhoto();
            }
        }

        echo $this->getProcessEnd();
    }

}

class CandleGreen extends candlePhoto
{
    public function getProcess()
    {
        return "Select photo of candle";
    }

    public function getColor()
    {
        return "Candel is Green"; 
    }
   
    public function getHeight()
    {
        return 25;
    }
    public function getWidht()
    {
        return 25;
    }
    public function loadPhoto()
    {      
        return "src/greencandle.jpg";
    }
    public function getProcessEnd()
    {
        return "Candle is ready";
    }
}


class CandlePink extends candlePhoto
{
    public function getProcess()
    {
        return "Select photo of candle";
    }
    public function getColor()
    {
        return "Candel is Pink"; 
    }
    public function getHeight()
    {
        return 40;
    }
    public function getWidht()
    {
        return 20;
    }
    public function loadPhoto()
    {
        return "src/pinkcandle.jpg";
    }
    public function getProcessEnd()
    {
        return "Candle is ready";
    }
}

class CandleRed extends candlePhoto
{
    public function getProcess()
    {
        return "Select photo of candle";
    }
    public function getColor()
    {
        return "Candel is Red"; 
    }
    public function getHeight()
    {
        return 50;
    }
    public function getWidht()
    {
        return 50;
    }
    public function loadPhoto()
    {
         return "src/redcandle.jpg";
    }
    public function getProcessEnd()
    {
        return "Candle is ready";
    }
}

$CandleGreen = new CandleGreen();
$CandleGreen->selectPhoto();

$CandleGreen2 = new CandlePink();
$CandleGreen2->selectPhoto();

$CandleGreen3 = new CandleRed();
$CandleGreen3->selectPhoto();


?>


________________________________________________________________

Wrong code:

<?php

class candlePhoto
{
    public function selectPhoto()
    {
        echo "Candle printing";

        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                echo "src/greencandle.jpg";
            }
        }

        echo "Candle is green";
    }
}

class candlePhoto2
{
    public function selectPhoto()
    {


        echo "Candle printing";

        for ($i = 0; $i < 20; $i++) {
            for ($j = 0; $j < 20; $j++) {
                echo "src/pingcandle.jpg";
            }
        }

        echo "Candle is pink";
    }
}
class candlePhoto3
{
    public function selectPhoto()
    {
        echo "Candle is red";

        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 20; $j++) {
                echo "src/redcandle.jpg";
            }
        }

        echo "Candle is red";
    }
}

$candlePhoto = new candlePhoto();
$candlePhoto->selectPhoto();

$candlePhoto2 = new candlePhoto2();
$candlePhoto2->selectPhoto();

$candlePhoto3 = new candlePhoto3();
$candlePhoto3->selectPhoto();



?>