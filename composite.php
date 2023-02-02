<?php

function printCategory($category)
{
    echo $category->getName() . PHP_EOL;
    if ($category instanceof CompositeCategory) {
        foreach ($category->getCategories() as $subCategory) {
            printCategory($subCategory);
        }
    }
}

$categories = [
    new CompositeCategory('Konsola', [
        new Category('Xbox'),
        new Category('Playstation'),
        new Category('Sony')
    ]),
    new CompositeCategory('Konsola Przenośna', [
        new Category('PSP'),
        new Category('Nintendo')
    ]),
    new CompositeCategory('Game Pass', [
        new CompositeCategory('Game Pass', [new Category('XBOX Game Pass'), new Category('PlayStation Plus')])
    ]),
];

foreach ($categories as $category) 
{
    printCategory($category);
}

class Category
{
    public string $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}

class CompositeCategory extends Category
{
    private $categories = [];

    public function __construct(string $name, array $categories)
    {
        parent::__construct($name);
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}

?>

_______________________________________________________________

Wrong code:
<?php

class Category
{
    public string $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}

$categories = [
    new Category('Konsola'),
    new Category('Konsola Przenośna'),
    new Category('Game Pass'),
];

foreach ($categories as $category) {
    echo $category->getName() . PHP_EOL;
}

?>
