<?php

interface webInterface
{
    public function attach($observable);

    public function detach($observer);

    public function notify();
}

interface Observer
{
    public function catch();
}

class userName implements webInterface
{
    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            foreach ($observable as $observer) {
                if (!$observer instanceof Observer)
                    throw new Exception();
                $this->attach($observer);
            }

            return;
        }

        $this->observers[] = $observable;

        return;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->catch();
        }
    }

    public function upload()
    {
        $this->notify();
    }
}

class credentialcatch implements Observer
{
    public function catch()
    {
        echo "Logging in new place" + "  ";
    }
}

class Emailcatch implements Observer
{
    public function catch()
    {
        echo "Catching emails" + "  ";
    }
}

$userName = new userName();
$userName->attach([
    new credentialcatch(),
    new emailcatch()
]);

$userName->upload();
