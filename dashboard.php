<?php
include 'classes/Product.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <title>Document</title>
</head>
<body>
<h1 class="title">Dashboard</h1>
<hr>
    <div class="mid">
        <ul>
            <li class="dashList">Add a product</li>
            <li class="dashList">Add a Categorie</li>
            <li class="dashList">Stock</li>
            <li class="dashList">Orders</li>
        </ul>
        <div class="formDiv">
            <form method="post" enctype="multipart/form-data">
                <label>
                    <input type="text" name="name" class="nameInput input" placeholder="Name">
                </label>
                <label class="fileContainer">
                    Choose a picture!
                    <input type="file" oninput="" name="fileToUpload" class="input" id="fileToUpload">
                </label>
                <label>
                    <input type="text" name="description" class="desInput input" placeholder="Description">
                </label>
                <label>

                    <input type="number" name="price" class="input" placeholder="Price">
                </label>
                <label>

                    <input type="number" name="productnumber" class="input" placeholder="Product number">
                </label>
                <label>

                    <input type="number" name="stock" class="input" placeholder="Stock">
                </label>
                <label>
                    <select name="categorie" class="input">
                        <option value="">Categorie</option>
                        <?php
                        $categorie = ['Food', 'Clothes', 'Cars'];
                        $lengthCategorie = count($categorie);
                        for ($i = 0; $i < $lengthCategorie; $i++){
                            echo "<option value='". $categorie[$i] ."'>". $categorie[$i] ."</option>";
                        }
                        ?>
                    </select>
                </label>
                <label class="button">
                    <input type="submit" name="submit" value="Submit">
                </label>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $fileName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $size = $_FILES["fileToUpload"]["size"];

    echo $fileName;

    $product = new Product();
    echo $product->checkProductNumber($_POST['productnumber'], $check) . "<br>";
    echo $product->checkWhitespaces($fileName) . "<br>";
    echo $product->checkIfFileExists($target_file) . "<br>";
    echo $product->checkFileFormat($imageFileType) . "<br>";
    echo $product->checkIfUpload(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file), $_POST['name'], $fileName, $_POST['description'], $_POST['price'], $_POST['productnumber'], $_POST['stock']) . "<br>";
}