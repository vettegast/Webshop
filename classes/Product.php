<?php

include 'Database.php';

class Product
{
    public $conn;
    public $uploadOk = 1;
    public $string = "";
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

//    Add products to product table in database
    public function addProduct($name, $description, $stock, $picture, $category, $price)
    {
        $sql = $this->conn->prepare("INSERT into products (name, description, stock, image, category, price) VALUES (:name,:description,:stock,:picture,:category,:price)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':stock', $stock);
        $sql->bindParam(':picture', $picture);
        $sql->bindParam(':category',$category);
        $sql->bindParam(':price', $price);
        $sql->execute();

        return $sql;
    }

//    Fetches all products form a specific category
    public function showProduct($category)
    {
        $statement = $this->conn->prepare('SELECT * FROM products WHERE category = :category');
        $statement->bindParam(":category", $category);
        $statement->execute();
        return $statement->fetchAll();
    }

//    public function checkProductNumber($productnumber, $check)
//    {
//        $statement = $this->conn->prepare('SELECT * FROM products WHERE productnumber = :productnumber');
//        $statement->bindParam(':productnumber', $productnumber);
//        $statement->execute();
//
//        if ($statement->rowCount() === 1) {
//            $this->uploadOk = 0;
//            $this->string = "This productnumber already exist";
//        } else {
//            if ($check !== false) {
//                $this->uploadOk = 1;
//
//            } else {
//                $this->uploadOk = 0;
//                $this->string = "File is not an image.";
//            }
//        }
//        return $this->string;
//    }

//    Check for Whitespaces in name
    public function checkWhitespaces($name){
        if (preg_match('/\s/', $name)){
            $this->uploadOk = 0;
            $this->string = "Sorry, your picture name can't have whitespaces in it";
        } else{
            $this->string = "";
        }
        return $this->string;
    }

    // Check if file already exists
    public function checkIfFileExists($target_file)
    {
        if (file_exists($target_file)) {
            $this->uploadOk = 0;
            $this->string = "Sorry, picture already exists.";
        } else{
            $this->string = "";
        }
        return $this->string;
    }

    // Allow certain file formats
    public function checkFileFormat($imageFileType)
    {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $this->uploadOk = 0;
            $this->string = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else{
            $this->string = "";
        }
        return $this->string;
    }

    // Check if $uploadOk is set to o or 1, if it is 1 then upload to Database
    public function checkIfUpload($moveFile, $name, $description, $stock, $filename, $category, $price)
    {
        if ($this->uploadOk == 0){
            $this->string = "Sorry, your picture was not uploaded.";
        } else{
            if ($moveFile){
                $sql = $this->addProduct($name, $description, $stock, $filename, $category, $price);
                if ($sql) {
                    $this->string = "The Product has been uploaded successfully.";
                } else {
                    $this->string = "The Product failed to upload, please try again.";
                }
            } else{
                $this->string = "Sorry, there was an error uploading your picture.";
            }
        }
        return $this->string;
    }
}