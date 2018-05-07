<?php

namespace Classes\LendableBook;

require 'Book.php';

use Classes\Book\Book;

//name Available confusing, as if a book becomes unavailable then it has contradictive statuses

class LendableBook extends Book {

//valid statuses are: Avalable, On loan, Lost; getters and setters methods no need for a public variable
    private $Status;

    public function __construct($Book_ID, $Title, $Author, $Category, $Language, $Format) {
        parent:: __construct($Book_ID, $Title, $Author, $Category, $Language, $Format);
        $this->Status = 'Available';
    }

//previous method borrowBook should be in the Library class as it's an action on a book
    public function setStatus($Status) {
        $this->Status = $Status;
    }

    public function getStatus() {
        return $this->Status;
    }

    function isAvaliableToRent() {
        if ($this->Status == "Available") {
            return true;
        } else {
            return false;
        }
    }

}
