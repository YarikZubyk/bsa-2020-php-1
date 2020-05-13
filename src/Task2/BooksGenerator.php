<?php

declare(strict_types=1);

namespace App\Task2;

use App\Task2\Book;


class BooksGenerator
{
    public $minPagesNumber;
    public $libraryBooks;
    public $maxPrice;
    public $storeBooks;

    public function __construct(int $minPagesNumber, array $libraryBooks, int $maxPrice, array $storeBooks)
    {
        try {
            if ($minPagesNumber < 0) {
                throw new Exception('Мінімальна кількість сторінок не може дорівнювати 0!');
            }
            if ($maxPrice < 0) {
                throw new Exception('Максимальна ціна не може бути менша за нуль');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
    }


    public function generate(): \Generator
    {
        foreach ($this->libraryBooks as $libraryBooks) {
            if ($libraryBooks->getPagesNumber() >= $this->minPagesNumber) {
                yield $libraryBooks;
            }
        }
        foreach ($this->storeBooks as $storeBooks) {
            if ($storeBooks->getPrice() <= $this->maxPrice) {
                yield $storeBooks;
            }
        }
    }
}

