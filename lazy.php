<?php

class MagentoShop implements MagentoInterface
{
    private array $customers = [];
    private bool $oauth2 = false;

    public function register(string $name): string
    {
        if (!array_key_exists($name, $this->customers)) {
            $this->customers[$name] = new MemoUsage($name);

            return sprintf("You're in !", $this->customers[$name]->getName());
        }

        return $this->login($this->customers[$name]->getName());
    }

    public function login(string $name): string
    {
        if (array_key_exists($name, $this->customers)){
            if (!$this->oauth2) {
                $this->oauth2 = true;

                return sprintf("user is logged", $name);
            }

            return sprintf("user was already logged", $name);
        }

        return sprintf("user must be registered", $name);
    }
}

interface MagentoInterface
{
    public function register(string $name): string;
    public function login(string $name): string;
}


interface customerInterface
{
    public function getName(): string;
}


class customer
{
  
    private $posts;

    
    private $magentoReference;

    public function setmagentoReference(Closure $magentoReference)
    {
        $this->magentoReference = $magentoReference;
    }

    
    public function getPosts()
    {
        if (!isset($this->posts)) {
            $magentoReference = $this->magentoReference;
            $this->posts = $magentoReference();
        }

        return $this->posts;
    }
}


class customerRepository
{
    
    private $db;

    public function postInForum($id)
    {
        $db = $this->db;
        $dbQuery = $db->dbQuery('SELECT * FROM customer WHERE id = :id');
        $dbQuery->setParm('id', $id);

        $customer = new customer($dbQuery->getResult());

        $magentoReference = function($id, $db) {
            $dbQuery = $db->dbQuery('SELECT * FROM post WHERE customer_id = :id');
            $dbQuery->setParm('id', $id);
            $customerData = $dbQuery->getResult();

            $posts = [];
            foreach ($customerData as $data) {
                $posts = new Post($data);
            }

            return $posts;
        };

        $customer->setmagentoReference($magentoReference);

        return $customer;
    }
}

declare(strict_types=1);


class MemoUsage implements customerInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
?>