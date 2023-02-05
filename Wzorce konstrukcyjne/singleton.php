<?php

class Main
{
    function construct(){
    }
    public static function Main()
    {
        $local_this = new Main();
        return $local_this;
    }
    public static function main(&$args)
    {
        $counter = Counter::Counter();
        $counter2 = Counter::Counter();
        $myValue = $counter->getCurrentValue();
        $myValue2 = $counter2->getCurrentValue();
        $i = 0;
        echo strval($i) . ": Value from counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
        $counter->add();
        $i = $i + 1;
        $myValue = $counter->getCurrentValue();
        $myValue2 = $counter2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
        $counter2->add();
        $i = $i + 1;
        $myValue = $counter->getCurrentValue();
        $myValue2 = $counter2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter2 = " . strval($myValue2),"\n";
        echo strval($i) . ": Value from counter = " . strval($myValue),"\n";
        $counter->add();
        $i = $i + 1;
        $myValue = $counter->getCurrentValue();
        $myValue2 = $counter2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
    }
}class Counter
{
    function construct(){
        $this->currentValue = 0;
    }
    private $currentValue;
    public static function Counter()
    {
        $local_this = new Counter();
        return $local_this;
    }
    public function getCurrentValue()
    {
        return $this->currentValue;
    }
    public function add()
    {
        $this->currentValue = $this->currentValue + 1;
    }
}
Main::main($argv);
?>


_________________________________________________________________

Wrong code:

<?php

class MainSingleton
{
    function __construct(){
    }
    public static function MainSingleton()
    {
        $local_this = new MainSingleton();
        return $local_this;
    }
    public static function main(&$args)
    {
        $counterSingleton = CounterSingleton::getInstance();
        $counterSingleton2 = CounterSingleton::getInstance();
        $myValue = $counterSingleton->getCurrentValue();
        $myValue2 = $counterSingleton2->getCurrentValue();
        $i = 0;
        echo strval($i) . ": Value from counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
        $counterSingleton->add();
        $i = $i + 1;
        $myValue = $counterSingleton->getCurrentValue();
        $myValue2 = $counterSingleton2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
        $counterSingleton2->add();
        $i = $i + 1;
        $myValue = $counterSingleton->getCurrentValue();
        $myValue2 = $counterSingleton2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter2 = " . strval($myValue2),"\n";
        echo strval($i) . ": Value from counter = " . strval($myValue),"\n";
        $counterSingleton->add();
        $i = $i + 1;
        $myValue = $counterSingleton->getCurrentValue();
        $myValue2 = $counterSingleton2->getCurrentValue();
        echo strval($i) . ": Value + 1 to counter = " . strval($myValue),"\n";
        echo strval($i) . ": Value from counter2 = " . strval($myValue2),"\n";
    }
}class CounterSingleton
{
    function __construct(){
        $this->currentValue = 0;
    }
    private static $uniqueInstance = CounterSingleton::CounterSingleton();
    private $currentValue;
    public static function CounterSingleton()
    {
        $local_this = new CounterSingleton();
        $this->currentValue = $this->getCurrentValue();
        return $local_this;
    }
    public static synchronized function getInstance()
    {
        if (self::$uniqueInstance == NULL)
        {
            synchronized (CounterSingleton->class)
            if (self::$uniqueInstance == NULL)
            {
                self::$uniqueInstance = CounterSingleton::CounterSingleton();
            }
        }
        return self::$uniqueInstance;
    }
    public function getCurrentValue()
    {
        return $this->currentValue;
    }
    public function add()
    {
        $this->currentValue = $this->currentValue + 1;
    }
}
MainSingleton::main($argv);
?>