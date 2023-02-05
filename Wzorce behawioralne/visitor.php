<?php 

interface SubtractionVisitor
{
    function visitSub(Subtraction $number): string;
}

interface SumVisitor
{
    function visitSum(Sum $number): string;
}

interface MultiplicationVisitor
{
    function visitMultiplication(Multiplication $number): string;
}

interface DivisionVisitor
{
    function visitDivision(Division $number): string;
}

interface Visitable
{
  function accept(Visitor $visitor):string;
}

final class Visitor implements SumVisitor, SubtractionVisitor, MultiplicationVisitor, DivisionVisitor
{

    function visitSub(Subtraction $b): string
    {
        echo "You're visiting: ".$b->Subtraction();
        return "-";
    }

    function visitSum(Sum $a): string
    {
        echo "You're visiting: " .$a->sum();
        return "+";
    }


    function visitMultiplication(Multiplication $c): string
    {
        echo "You're visiting: ".$c->Multiplication();
        return "*";
    }

    function visitDivision(Division $d): string
    {
        echo "You're visiting ".$d->Division();
        return "/";
    }
}

class Division implements Visitable
{
    private int $a,$b;
    
    public function __construct(int $a, int $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    
    public function Division():int
    {
        return $this->a/$this->b;
    }
    
    public function accept(DivisionVisitor $visitor): string
    {
        return $visitor->visitDivision($this);
    }
}
class Utilization
{
    public static final function tempFanc():void
    {
        $visitor = new Visitor();
        $visitables = [new Sum(1,2), new Subtraction(5,2),new Sum(1,6), new Multiplication(4,5),new Multiplication(2,7),new Division(14,2)];
        
        foreach($visitables as $toVisit)
        {
            printf("after visiting",get_class($toVisit),$toVisit->accept($visitor));
        }
    }
}


class Subtraction implements Visitable
{
    private int $a,$b;
    
    public function __construct(int $a, int $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    
    public function Subtraction():int
    {
        return $this->a-$this->b;
    }
    
    public function accept(SubtractionVisitor $visitor): string
    {
      return $visitor->visitSub($this);
    }

}

class Sum implements Visitable
{
    private int $a,$b;
    
    public function __construct(int $a, int $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    
    public function sum():int
    {
        return $this->a+$this->b;
    }
    
    public function accept(SumVisitor $visitor): string
    {
        return $visitor->visitSum($this);
    }
}

class Multiplication implements Visitable
{
    private int $a,$b;
    
    public function __construct(int $a, int $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    
    public function Multiplication():int
    {
        return $this->a*$this->b;
    }
    
    public function accept(MultiplicationVisitor $visitor): string
    {
        return $visitor->visitMultiplication($this);
    }
}

?>
___________________________________________________________________________________________
Wrong code:


<?php
class Calculator
{
    private $value = 0;

    public function add($num)
    {
        $this->value += $num;
    }
    public function subtract($num)
    {
        $this->value -= $num;
    }
    public function divide($num)
    {
        $this->value /= $num;
    }
    public function multiply($num)
    {
        $this->value *= $num;
    }

    public function getValue()
    {
        return $this->value;
    }
}
?>

<?php
require_once 'Calculator.php';

$calc = new Calculator();
$calc->add(10);
echo $calc->getValue() . PHP_EOL;
$calc->divide(3);
echo $calc->getValue() . PHP_EOL;
?>
