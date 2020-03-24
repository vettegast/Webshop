
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>
    <link rel="stylesheet" href="CSS/webshop.css">
    <link rel="stylesheet" href="CSS_template/CSS_template.css">
</head>
<body>
    <div class="mid">
        <?php
        include 'classes/Product.php';

        $item = new Product();

        foreach ($item->showProduct("zeep") as $item) {
            echo '<div class="product">
                <h1 class="titleProduct">' . ucfirst(strtolower($item['name'])) . '</h1>
                <div class="img" style="background-image: url(uploads/' . $item['image'] . ')"></div>
                <p class="desc">' . $item['description'] . '</p> <br>
                <p class="price">€' . $item['price'] . '</p>
                <p class="stock" ';
                if ($item['stock'] > 0){
                    echo "style=\"color:black\">Still in stock";
                } else{
                    echo "style=\"color:red\">Out of stock";
                }
                echo '</p>
                <div class="lastDiv">
                    <input type="number" class="input_number totalProducts" value="1">
                    <div class="cartButton"><img src="images/shopping-bag.png" class="cartImages" alt="Shopping-bag"></div>
                </div>
            </div>';
        }
        ?>
    </div>
</body>
</html>


