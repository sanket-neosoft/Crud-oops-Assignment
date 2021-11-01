<?php
include("common.class.php");

class Update extends Connection
{
    public function __construct($id, $name, $age, $city, $image, $image_tmp = "")
    {
        // input fileds 
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
        $this->image = $image;
        $this->image_tmp = $image_tmp;

        // error checking 
        $errors = $this->errorHandlerUpdate($this->name, $this->age, $this->city);

        if ($errors === true) {
            if ($this->image_tmp !== "") {
                // uploading image file if new file exist
                $this->image = rand(). "-". time(). "." ."jpg";
                move_uploaded_file($this->image_tmp, "../uploads/" . $this->image);
            }
            //updating data base
            $this->update = $this->connect()->prepare("UPDATE `employees` SET `name` = ?, `age` = ?, `city` = ? , `image` = ? WHERE `employees`.`id` = ?;");
            $this->update->execute(array($this->name, $this->age, $this->city, $this->image, $this->id));
        } else {
            return $errors;
        }
    }
}
