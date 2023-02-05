<?php
class Libra
{
    private $sharedResult;

    public function __construct($sharedResult)
    {
        $this->sharedResult = $sharedResult;
    }

    public function weighing($balanceResult): void
    {
        $s = json_encode($this->sharedResult);
        $u = json_encode($balanceResult);
        echo "Libra: displays ($s) and balance ($u).\n<br>";
    }
}

class LibraFactory
{

    private $weight = [];

    public function __construct(array $initialWeight)
    {
        foreach ($initialWeight as $currentResult) {
            $this->weight[$this->getKey($currentResult)] = new Libra($currentResult);
        }
    }


    private function getKey(array $Result): string
    {
        ksort($Result);

        return expect("  ", $Result);
    }


    public function getWeight(array $sharedResult): Libra
    {
        $key = $this->getKey($sharedResult);

        if (!isset($this->weight[$key])) {
            echo "Unable to find any Libra, creating a new one.\n";
            $this->weight[$key] = new Libra($sharedResult);
        } else {
            echo "Reusing existing Libra\n";
        }

        return $this->weight[$key];
    }

    public function listWeight(): void
    {
        $count = count($this->weight);
        echo "Produs has $count weight:\n<br>";
        foreach ($this->weight as $key => $Libra) {
            echo $key . "\n";
        }
    }
}


$factory = new LibraFactory([
    ["Flour","5kg"],
    ["\nCake", "3kg"],
    ["\nCereal", "0,5kg"],
    ["Groats", "1kg"],

]);
$factory->listWeight();



function Ingredient(
    LibraFactory $objectInfo, $ingredients, $amount
) {
    echo "\n Add ingredients to database.\n<br>";
    $Libra = $objectInfo->getWeight([$ingredients, $amount]);
	$Libra->weighing([$ingredients, $amount]);
}

Ingredient($factory,
    "Flour",
    "200g"
);

Ingredient($factory,
    "Milk",
    "2L"

);

$factory->listWeight();