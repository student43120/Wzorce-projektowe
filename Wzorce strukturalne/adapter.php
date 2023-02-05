<?php

namespace Adapter;

class photoBook implements photoBookInterface
{
    public function open()
    {
        echo "opening the" + "photoBook";
    }

    public function changePhoto()
    {
        echo "going to next photo" + " ";
    }
}

interface photoBookInterface
{
    public function open();

    public function changePhoto();
}


class deviceScreenAdapter implements photoBookInterface
{
    protected $browsing;

    public function __construct(deviceScreenInterface $browsing)
    {
        $this->browsing = $browsing;
    }


    public function open()
    {
        return $this->browsing->turnOn();
    }

    public function changePhoto()
    {
        return $this->browsing->pressNextButton();
    }
}

interface deviceScreenInterface
{
    public function turnOn();

    public function pressNextButton();
}

class Smartphone implements deviceScreenInterface
{

    public function turnOn()
    {
        echo "Smartphone turning on" + " ";
    }

    public function pressNextButton()
    {
        echo "press next button" + "on" + "smartphone";
    }
}


class Laptop implements deviceScreenInterface
{

    public function turnOn()
    {
        echo "Laptop turning on";
    }

    public function pressNextButton()
    {
        echo "press next button" + "on" + "laptop";
    }
}