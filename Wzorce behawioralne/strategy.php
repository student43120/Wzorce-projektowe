<?php

interface Register
{
    public function registration($data);
}

class registrationToservice implements Register
{

    public function registration($data)
    {
        echo "{$data}: registration to the service \n";
    }
}

class registrationToDatabase implements Register
{
    public function registration($data)
    {
        echo "{$data}: registration to the database \n";
    }
}

class registrationToWebService implements Register
{
    public function registration($data)
    {
        echo "{$data}: registration to the Web service \n";
    }
}

class App
{
    public function registration($data, register $register)
    {
        $register->registration($data);
    }
}

$app = new App();
$app->registration('Info', new registrationToservice());

?>

___________________________________________________________________________________________

Wrong code:

<php?

$registration = new Register();
$dataLoad= new Data();

class Registration
{
    private $register;
    private $data;

    public function getregister()
    {
        return $this->register;
    }

    public function setregister($register)
    {
        $this->register = $register;

        return $this;
    }

}

class registrationToservice extends Registration
{
    public function __construct()
    {
        parent::setRegistrationType('registrationToservice');
    }
}

class registrationToDatabase extends Registration
{
    public function __construct()
    {
        parent::setRegistrationType('registrationToDatabase');
    }
}


class registrationToWebService extends Register
{
    public function __construct()
    {
        parent::setRegistrationType('registrationToWebService');
    }

}

?>
