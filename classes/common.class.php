<?php
class Connection
{
    public $result;
    private $target_dir = "../uploads/";

    // db connectivity
    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=php_training", "root", "");
            return $conn;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }

    // error handler method for adding data 
    protected function errorHandler($username, $email, $name, $age, $city, $image)
    {
        $this->validateUsername($username);
        $this->validateEmail($email);
        $this->validateName($name);
        $this->validateAge($age);
        $this->validateCity($city);
        $this->validateImage($image);

        if ($this->result["username_err"] === "" && $this->result["email_err"] === "" && $this->result["name_err"] === "" && $this->result["age_err"] === "" && $this->result["city_err"] === "" && $this->result["image_err"] === "") {
            return true;
        } else {
            $this->result["validation"] = false;
            return $this->result;
        }
    }

    // error handler method for updating data 
    protected function errorHandlerUpdate($name, $age, $city)
    {
        $this->validateName($name);
        $this->validateAge($age);
        $this->validateCity($city);

        if ($this->result["name_err"] === "" && $this->result["age_err"] === "" && $this->result["city_err"] === "") {
            return true;
        } else {
            $this->result["validation"] = false;
            return $this->result;
        }

    }

    // validation method for username 
    private function validateUsername($username)
    {
        $this->result["username_err"] = "";
        $this->username_query = $this->connect()->query("SELECT * FROM employees WHERE username = '$username';");
        if (empty($username)) {
            $this->result["username_err"] = "Username is Required";
        } else if (!preg_match("/^[a-zA-Z0-9_]{3,30}$/", $username)) {
            $this->result["username_err"] = "Only Alphabets, Numbers and \"_\" are allowed. Length of username must be between 3 to 30";
        } else if ($this->username_query->rowCount() > 0) {
            $this->result["username_err"] = "Username Already taken";
        }
    }

    // validation method for email 
    private function validateEmail($email)
    {
        $this->result["email_err"] = "";
        $this->email_query = $this->connect()->query("SELECT * FROM employees WHERE email = '$email';");
        if (empty($email)) {
            $this->result["email_err"] = "Email is Required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->result["email_err"] = "Invalid email ";
        } else if ($this->email_query->rowCount() > 0) {
            $this->result["email_err"] = "Email Address Already taken";
        }
    }

    // validation method for name 
    private function validateName($name)
    {
        $this->result["name_err"] = "";
        if (empty($name)) {
            $this->result["name_err"] = "Name is Required";
        } else if (!preg_match("/^[a-zA-Z ]{3,30}$/", $name)) {
            $this->result["name_err"] = "Only alphabets and white spaces are allowed. ";
        }
    }

    // validation method for age 
    private function validateAge($age)
    {
        $this->result["age_err"] = "";
        if (empty($age)) {
            $this->result["age_err"] = "Age is Required";
        }
    }

    // validation method for city 
    private function validateCity($city)
    {
        $this->result["city_err"] = "";
        if (empty($city)) {
            $this->result["city_err"] = "City is Required";
        }
    }

    // validation method for image 
    private function validateImage($image)
    {
        $this->result["image_err"] = "";
        $this->image = basename($image);
        $this->extension = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));

        if (empty($image)) {
            $this->result["image_err"] = "Image is Required";
        } else if ($this->extension !== "jpg") {
            $this->result["image_err"] = "Only jpg files can be uploaded";
        } else {
            $this->result["image_err"] = "";
        }
    }

    // uploading image method
    protected function imageUpload($image, $image_tmp)
    {
        $this->result["image_err"] = "";
        $this->image = $image;
        $this->image_tmp = $image_tmp;
        $this->extension = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));
        $this->filename = rand() . "-" . time() . "." . $this->extension;
        if (!move_uploaded_file($this->image_tmp, $this->target_dir . $this->filename)) {
            return $this->result["image_err"] = "Image Upload Falied";
        } else {
            return true;
        }
    }

    // method for fetching all row from db
    public function showAll()
    {
        $this->show = $this->connect()->query("SELECT * FROM employees;");
        $this->result = $this->show->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }

    // method for fetching respective row from db 
    public function showOne($id)
    {
        $this->id = $id;
        $this->show = $this->connect()->prepare("SELECT * FROM employees WHERE id = ?");
        $this->show->execute(array($this->id));
        $this->result = $this->show->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }
}
