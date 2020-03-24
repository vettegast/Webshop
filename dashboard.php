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
    <link rel="stylesheet" href="CSS_template/CSS_template.css">
    <title>Document</title>

    <script type="text/javascript" src="index.js"></script>
</head>
<body>
<h1 class="title">Dashboard</h1>
    <div class="mid">
        <ul class="dashUl">
            <li class="dashList" id="listProduct" onclick="show('product')" style="background-color: #FFC815">Add a product</li>
            <li class="dashList" id="listCategory" onclick="show('category')">Add a Categorie</li>
            <li class="dashList" id="listStock" onclick="show('stock')">Stock</li>
            <li class="dashList" id="listOrders" onclick="show('orders')">Orders</li>
        </ul>
        <div class="formDiv">
            <form method="post" class="formProduct" id="formProduct" enctype="multipart/form-data" style="display: flex;">
                <label>
                    <input type="text" name="name" class="input_text" placeholder="Name">
                </label>
                <label class="fileContainer">
                    Choose a picture!
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </label>
                <label>
                <textarea cols="30" rows="10" name="description" class="input_text" placeholder="Description"></textarea>
                </label>
                <label>

                    <input type="number" name="price" class="input_text" placeholder="Price">
                </label>
                <label>
                    <input type="number" name="productnumber" class="input_text" placeholder="Product number">
                </label>
                <label>
                    <input type="number" name="stock" class="input_text" placeholder="Stock">
                </label>
                <label>
                    <select name="categorie">
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
                    <input type="submit" class="input_button" name="submit" value="Submit">
                </label>
            </form>

            <form method="post" class="formCategory" id="formCategory" style="display: none;">
                <h1>category</h1>
            </form>

            <form method="post" class="formStock" id="formStock" style="display: none;">
                <h1>stock</h1>
            </form>

            <form method="post" class="formOrders" id="formOrders" style="display: none;">
                <h1>orders</h1>
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
//    echo $product->checkProductNumber($_POST['productnumber'], $check) . "<br>";
    echo $product->checkWhitespaces($fileName) . "<br>";
    echo $product->checkIfFileExists($target_file) . "<br>";
    echo $product->checkFileFormat($imageFileType) . "<br>";
    echo $product->checkIfUpload(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file), $_POST['name'], $fileName, $_POST['description'], $_POST['price'], $_POST['productnumber'], $_POST['stock']) . "<br>";
}