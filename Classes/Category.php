<?php
namespace Clasess\Category;

class Category {

    public $Category_ID;
    public $Type;
    
    public function __construct($Category_ID, $Type) {
        $this->Category_ID = $Category_ID;
        $this->Type = $Type;
    }

    public function getCategory() {
        return "$this->Type" . " is the category of this book. \n";
    }
}
//should the categories be constants?

$Fiction = new Category("1", "Fiction");
echo $Fiction->getCategory();
$NonFiction = new Category("2", "Non Fiction");
echo $NonFiction->getCategory();
$Science = new Category("3", "Science");
$Biography = new Category("4", "Biography");
$Educational = new Category("5", "Educational");
