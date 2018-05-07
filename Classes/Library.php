<?php

namespace Classes\Library;

require 'LendableBook.php';
require __DIR__ . '/../Traits/Bookable.php';

use Traits\Bookable\Bookable;
use Classes\LendableBook\LendableBook;

class Library {

    use Bookable;

    public $books;

    public function __construct() {
        $this->books = [];
    }

//assumption that books added into an array - array number = Book_ID; means books can't be removed

    public function addBook(LendableBook $bookToAdd) {
        array_push($this->books, $bookToAdd);
    }

    public function borrowBook(int $Book_ID) {
        $bookToBorrow = $this->books[$Book_ID];
        if ($bookToBorrow->isAvaliableToRent() == 1) {
            $bookToBorrow->setStatus("On loan");
            echo $bookToBorrow->getTitle() . " is now " . $bookToBorrow->getStatus() . PHP_EOL;
        } else {
            echo "Book not available!" . PHP_EOL;
        }
    }

    public function returnBook(int $Book_ID) {
        $bookToReturn = $this->books[$Book_ID];
        $bookToReturn->setStatus("Available");
        echo $this->printResultBookID() . $bookToReturn->getID() . $bookToReturn->getTitle() . " has been returned and is " . $bookToReturn->getStatus() . PHP_EOL;
    }

    public function lostBook(int $Book_ID) {
        $bookLost = $this->books[$Book_ID];
        $bookLost->setStatus("Lost");
        echo $this->printResultBookID() . $bookLost->getID() . $bookLost->getTitle() . " is " . $bookLost->getStatus() . PHP_EOL;
    }

    //books can't be removed because of database integrity but status can be changed to discarded
    public function removeBook(int $Book_ID) {
        $bookToRemove = $this->books[$Book_ID];
        $bookToRemove->setStatus("Discarded");
        echo $this->printResultBookID() . $bookToRemove->getID() . $bookToRemove->getTitle() . " has been " . $bookToRemove->GetStatus() . PHP_EOL;
    }

//        if (gettype($bookToAdd) == "object" && (get_class($bookToAdd) == 
//                "LendableBook\LendableBook" || get_class($bookToAdd) == "RentedBook\RentedBook")) {
//            array_push($this->books, $bookToAdd);
//        } else {
//            die('bbye');
//        }
    public function countBooks() {
        return sizeof($this->books);
    }

    public function listBooks() {
        foreach ($this->books as $CurrentBook) {
            echo $CurrentBook->getInfo();
            echo $CurrentBook->isAvaliableToRent() . "\n";
        }
    }

}
