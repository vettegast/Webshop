
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>
    <link rel="stylesheet" href="CSS/webshop.css">
</head>
<body>
    <div class="mid">
        <?php
        include 'classes/Product.php';

        $item = new Product();

        foreach ($item->showProduct() as $item) {
            echo '<div class="product">
                <h1>' . $item['name'] . '</h1>
                <div class="img" style="background-image: url(uploads/' . $item['image'] . ')"></div>
                <p>' . $item['description'] . '</p> <br>
                <p>' . $item['price'] . '</p>
                <p>';
                if ($item['stock'] > 0){
                    echo "Still in stock";
                } else{
                    echo "Out of stock";
                }
                echo '</p>
                <div>
                    <input type="number" class="input_number">
                    <span class="cartButton"></span>
                </div>
            </div>';
        }
        ?>
    </div>
</body>
</html>


