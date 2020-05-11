<?php

declare(strict_types=1);

namespace App\Task2;

class BooksGenerator
{
    public $minPagesNumber;
    public $libraryBooks;
    public $maxPrice;
    public $storeBooks;

    public function __construct(int $minPagesNumber, array $libraryBooks, int $maxPrice, array $storeBooks)
    {
        if ($minPagesNumber < 0 || $maxPrice < 0){
            new \Exception('Повинно бути більше 0');
            die;
        }

        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
    }


    public function generate(): \Generator
    {
        foreach ($this->libraryBooks as $libraryBook) {
            if ($libraryBook->getPagesNumber() >= $this->minPagesNumber) {
                yield $libraryBook;
            }
        }
        foreach ($this->storeBooks as $storeBook) {
            if ($storeBook->getPrice() <= $this->maxPrice) {
                yield $storeBook;
            }
        }
    }
}