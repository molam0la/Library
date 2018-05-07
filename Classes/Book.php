<?php

namespace Classes\Book;

require __DIR__ . '/../Interfaces/Identifiable.php';

use Interfaces\Identifiable\Identifiable;

abstract class Book implements Identifiable {

    private $Book_ID;
    private $Title;
    private $Author;
    private $Category;
    private $Language;
    private $Format;

    public function __construct($Book_ID, $Title, $Author, $Category, $Language, $Format) {
        if ($Book_ID == null and $Title == null and $Author == null and $Category == null and
                $Language == null and $Format == null) {
            die('You are missing a field');
        }
        $this->Book_ID = $Book_ID;
        $this->Title = $Title;
        $this->Author = $Author;
        $this->Category = $Category;
        $this->Language = $Language;
        $this->Format = $Format;
    }

    public function getID() {
        return $this->Book_ID;
    }

    public function getAuthor() {
        return $this->Author;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function getInfo() {
        return "Title: " . $this->Title . PHP_EOL .
                "Author: " . $this->Author . PHP_EOL .
                "Language: " . $this->Language . "\n";
    }

    public function setLanguage($newLanguage) {
        if ($this->isLanguageValid(newLangauge)) {
            $this->Language = $newLanguage;
        }
        //setters usually don't return
    }

    private function isLangaugeValid($language) {
        //somehow validates language
        return true;
    }

    abstract function isAvaliableToRent();

    abstract function getStatus();
}
