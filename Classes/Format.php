<?php

namespace Classes\Format;

Class Format {

    public $Format_ID;
    public $Format;

    public function __construct($Format_ID, $Format) {
        $this->Format_ID = $Format_ID;
        $this->Format = $Format;
        if ($this->Format == 'Electronic') {
            echo "This is an Electronic version! \n";
        } else if ($this->Format == 'Hardback') {
            echo "This is a Hardback version! \n";
        } else if ($this->Format == 'Paperback') {
            echo "This is a Paperback version! \n";
        } else {
            die('This is not a valid input!');
        }
    }

    public function getFormat() {
        return "$this->Format" . " is the current format \n";
    }

    public function updateFormat($newvalue) {
        $this->Format = $newvalue;

        if ($this->Format == 'Electronic') {
            echo "The new format is an Electronic version! \n";
        } else if ($this->Format == 'Hardback') {
            echo "The new format is a Hardback version! \n";
        } else if ($this->Format == 'Paperback') {
            echo "The new format is a Paperback version! \n";
        } else {
            die('Sorry, this is not a valid input!');
        }
    }
}

$myFormat = new Format(1, 'Paperback');
echo $myFormat->getFormat();
$myFormat->updateFormat('Hardback');
$myFormat->getFormat();
