<?php
include("common.class.php");

class Add extends Connection
{
    public function __construct($username, $email, $name, $age, $city, $image, $image_tmp)
    {
        // input fields 
        $this->username = $username;
        $this->email = $email;
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
        $this->image = $image;
        $this->image_tmp = $image_tmp;

        // errors check
        $errors = $this->errorHandler($this->username, $this->email, $this->name, $this->age, $this->city, $this->image);

        if ($errors === true) {
            // uploding file 
            $uploadImage = $this->imageUpload($image, $image_tmp);
            if ($uploadImage === true) {
                // inserting data to db 
                $add = $this->connect()->prepare("INSERT INTO employees(`username`, `email`, `name`, `age`, `city`, `image`) VALUES(?, ?, ?, ?, ?, ?);");
                $add->execute(array($this->username, $this->email, $this->name, $this->age, $this->city, $this->filename));
            } else {
                // returning error 
                return $uploadImage;
            }
        } else {
            // returning error 
            return $errors;
        }
    }
}
