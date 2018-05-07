<?php

namespace Traits\countBooksByStatus;

trait countBooksByStatus {

    public function countBooksbyAvailable() {
        
        return sizeof($this->books);
    }
}
