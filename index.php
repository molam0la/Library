<?php

//require 'Classes/Book.php';
//require 'Classes/LendableBook.php';
require 'Classes/Library.php';

use Classes\Library\Library;
use Classes\LendableBook\LendableBook;
use Interfaces\Identifiable\Identifiable;

$Library = new Library();

$Library->addBook(new LendableBook("1", "The Little Mermaid", "Charles
Dickens", "Fiction", "English", "Paperback"));
$Library->addBook(new LendableBook("2", "Tom and Jerry", "Jane Smith", "Fiction", "French", "Paperback"));

$Library->listBooks();
//Borrowing Little Mermaid
$Library->borrowBook(0);
//Trying to borrow a book On loan - should return "Book not available!"
$Library->borrowBook(0);
$Library->borrowBook(1);
$Library->returnBook(1);
$Library->lostBook(1);
$Library->removeBook(1);