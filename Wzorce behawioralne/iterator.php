<?php

declare(strict_types=1);

class Tome implements LibraryInterface
{
    private int $id;

    public function __construct(
        private string $title
    ) {
        $this->id = uniqid();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

class LibraryCollection 
{
    private array $books = [];

    public function add(LibraryInterface $book): void
    {
        $this->books[$book->getId()] = $book;
    }

    public function current(): ?LibraryInterface
    {
        return current($this->books) ?: null;
    }

    public function next(): void
    {
        next($this->books);
    }

    public function key(): ?int
    {
        return key($this->books);
    }

    public function valid(): bool
    {
        return null !== $this->key();
    }

    public function rewind(): void
    {
        reset($this->books);
    }
}

interface LibraryInterface
{
    public function getId(): int;

    public function getTitle(): string;
}

class Directory implements LibraryInterface
{
    private int $id;

    private LibraryCollection $books;

    public function __construct()
    {
        $this->id = uniqid();
        $this->books = new LibraryCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function gettitle(): string {
        $title = [];
        foreach ($this->books as $book) {
            $title += $book->gettitle();
        }

        return $title;
    }

    public function addbook(LibraryInterface $book): void
    {
        $this->books->add($book);
    }
}


___________________________________________________________________________________

Wrong code:
//SQL part
CREATE DATABASE BookStore;
USE LibraryCollection;

CREATE TABLE Book(
    BookID int(15),
	BookTitle varchar(200),
);
/*
INSERT INTO `book`(`BookID`, `BookTitle`) VALUES ('1','Boo1ko and frends');
INSERT INTO `book`(`BookID`, `BookTitle`) VALUES ('2','Alice in the madness');
INSERT INTO `book`(`BookID`, `BookTitle`) VALUES ('3','Techno and disco time');
INSERT INTO `book`(`BookID`, `BookTitle`) VALUES ('4','Fred and frends');

*/

$stockBook = $_SESSION['stockBook'];
$action = $_GET['action'];

switch ($action) {
	case 'add':
		if ($stockBook) {
			$stockBook .= ','.$_GET['id'];
		} else {
			$stockBook = $_GET['id'];
		}
		break;
	case 'rewind':
		if ($stockBook) {
			$items = explode(',',$stockBook);
			$newstockBook = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newstockBook != '') {
						$newstockBook .= ','.$item;
					} else {
						$newstockBook = $item;
					}
				}
			}
			$stockBook = $newstockBook;
		}
		break;
	case 'next':
	if ($stockBook) {
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'valid')) {
				$id = str_replace('valid','',$key);
				$items = explode(',',$stockBook);
				
				for ($i=1;$i<=$value;$i++) {
					if ($stockBook != '') {
						$stockBook .= ','.$id;
					} else {
						$stockBook = $id;
					}
				}
			}
		}
	}
	echo($stockBook);

	break;
}





