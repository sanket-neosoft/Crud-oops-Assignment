<?php
include("common.class.php");

class Delete extends Connection
{
    public function __construct($id)
    {   
        // deleting respective row 
        $this->id = $id;
        $this->delete = $this->connect()->prepare("DELETE FROM employees WHERE id = ?");
        $this->delete->execute(array($this->id));
    }
}
