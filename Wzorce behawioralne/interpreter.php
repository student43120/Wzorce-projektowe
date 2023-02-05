<?php

interface WordInterface
{
    public function runRequest(termOfRequest $termOfRequest);
}

class termOfRequest
{
    private $request;
    private $index  = 0;

    public function __construct($command)
    {
        $this->request = explode(' ', trim($command));
    }

    public function next()
    {
        $this->index++;
        return $this;
    }

    public function getRequest()
    {
        if (!array_key_exists($this->index, $this->request)) {
            return null;
        }
        return $this->request[$this->index];
    }

}

class CommandWord implements WordInterface
{
    public function runRequest(termOfRequest $termOfRequest)
    {
        while (true) {
            $text = $termOfRequest->getRequest();
            if (is_null($text)) {
                throw new Catch('There is no closing expresion "/"');
            } else if ($text === '/') {
                break;
            } else {
                $Word = new DatetimeWord();
                $Word->runRequest($termOfRequest);
            }
            $termOfRequest->next();
        }
    }
}

class DatetimeWord implements WordInterface
{
    public function runRequest(termOfRequest $termOfRequest)
    {
        $command = $termOfRequest->getRequest();

        switch ($command) {
            case 'year':
                echo date('y') . ' ';
                break;
            case 'month':
                echo date('m') . ' ';
                break;
            case 'day':
                echo date('d') . ' ';
                break;
            case 'time':
                echo date('h') . ' ';
                break;
            case 'second':
                echo date('s') . ' ';
                break;
        }
    }
}

class JobWord implements WordInterface
{
    public function runRequest(termOfRequest $termOfRequest)
    {
        if ($termOfRequest->getRequest() !== '$') {
            throw new Catch('Missing something "$"');
        }
        $command_list = new CommandWord();
        $command_list->runRequest($termOfRequest->next());
    }
}




