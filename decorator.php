<?php

interface laptopService
{
    public function getCost();

    public function getListtoDo();
}

class Overview implements laptopService
{
    public function getCost()
    {
        return 20;
    }

    public function getListtoDo()
    {
        return 'Laptop health check';
    }
}

class batteryChange implements laptopService
{
    protected $laptopService;

    public function __construct(laptopService $laptopService)
    {
        $this->laptopService = $laptopService;
    }


    public function getCost()
    {
        return 5 + $this->laptopService->getCost();
    }

    public function getListtoDo()
    {
        return $this->laptopService->getListtoDo() . ', and battery change ';
    }
}

class keyboardChange implements laptopService
{
    protected $laptopService;

    public function __construct(laptopService $laptopService)
    {
        $this->laptopService = $laptopService;
    }


    public function getCost()
    {
        return 14 + $this->laptopService->getCost();
    }

    public function getListtoDo()
    {
        return $this->laptopService->getListtoDo() . ', and keyboard change';
    }
}


$service = new batteryChange();
$service = new keyboardChange($service);
$service = new Overview($service)
echo $service->getListtoDo();
