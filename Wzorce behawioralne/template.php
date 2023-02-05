<?php

titlespace posterApp;

abstract class Poster {

    public function create()
    {
        return $this
            ->addTitle()
            ->addMainsection()
            ->addQrcode()
            ->addExtratables();
    }

    protected function addTitle()
    {
        var_dump("adding title to poster");
        return $this;
    }

    protected function addMainsection()
    {
        var_dump("adding main section to poster");
        return $this;
    }

    protected function addExtratables()
    {
        var_dump("adding extra section to poster");
        return $this;
    }

    abstract protected function addQrcode(): void
        {"adding QR code"};

}

class partyPoster extends Poster {

    protected function addQrcode () {
        var_dump("adding QR code to poster about party");
        return $this;
    }
}


class politicalPoster extends Poster {

    protected function addQrcode () {
        var_dump("adding QR code to poster about political debate");
        return $this;
    }
}

?>


___________________________________________________________________________________
BEFORE:

<?php
class Poster {
  public $title;
  public $mainsection;
  public function __construct($title,$mainsection,$extratables,$Qrcode) {
    $this->title = $title;
    $this->mainsection = $mainsection;
    $this->extratables = $extratables;
    $this->$Qrcode = $Qrcode;
  }
  public function defaultPoster() {
    echo "The Poster is {$this->title} and the main section is {$this->mainsection}.";
  }
}

// partyPoster is inherited from Poster
class partyPoster extends Poster {
  public function message() {
    echo "I'm poster about party ";
  }
}
$partyPoster = new partyPoster("Party Poster", "Party in London", "Party will begin at 8 PM in Royal Palace", "tickets", "UobGnacN");
$partyPoster->message();
$partyPoster->defaultPoster();

// debatePoster is inherited from Poster
class debatePoster extends Poster {
    public function message() {
        echo "I'm poster about political debate"
    }
}

$debatePoster = new debatePoster("Political debate", "Debate at University of Oxford", "Welcome everyone, we will meet at 4 PM Today", "Informations",  "BsueJaCN" )
$debatePoster->message();
$debatePoster->defaultPoster();
?>
