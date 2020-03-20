
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
                <div class="img" style="background-image: url(uploads/' . $item['picture'] . ')"></div>
                <p>' . $item['description'] . '</p> <br>
                <p>' . $item['price'] . '</p>
            </div>';
        }
        ?>
    </div>
</body>
</html>


