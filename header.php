<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>

        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="CSS_template/CSS_template.css">
        <script src="index.js"></script>
    </head>
    <body>
        <header>

            <div id="top">
                <div style="display: flex; flex-direction: row;">
                    <a href="index.php" style="display: flex; flex-direction: column; justify-content: center">
                        <span class="heading yellow_text" id="logo">Partners in Grime</span>
                    </a>
                    <nav>
                        <ul>
                            <li><a href="index.php" class="yellow_text">Home</a></li>
                            <li><a href="webshop.php">Webshop</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>

                <a class="icon" id="burger_menu" style="margin-right: 10px" onclick="myFunction()">
                    <img src="images/menu.png" alt="#" class="icon">
                </a>

                <div id="nav_userinfo">
                    <div>
                        <p class="heading white_text" style="text-align: left">Welcome</p>
                        <p class="yellow_text" style="margin: 0">Username</p>
                    </div>
                    <img src="images/user.png" alt="#" class="icon">
                    <a href="" class="icon" style="padding: 0">
                        <img src="images/supermarket.png" alt="#" class="icon">
                    </a>
                </div>
            </div>

            <div class="topnav" id="topnav">
                <div id="myLinks">
                    <div id="burger_userinfo">
                        <div>
                            <p class="heading white_text" style="text-align: left">Welcome</p>
                            <p class="yellow_text" style="margin: 0">Username</p>
                        </div>
                        <img src="images/user.png" alt="#" class="icon">
                        <a href="" class="icon" style="padding: 0">
                            <img src="images/supermarket.png" alt="#" class="icon">
                        </a>
                    </div>
                    <a href="index.php" class="yellow_text">Home</a>
                    <a href="webshop.php">Webshop</a>
                    <a href="contact.php">Contact</a>
                </div>
            </div>

            <div id="parallax">
                <div id="bg_img_cover">
                    <div id="name">
                        <p class="heading yellow_text">Partners in Grime</p>
                        <p class="white_text" style="margin: 0; font-size: 20px">Cleaning products</p>

                        <form method="post" action="webshop.php" style="width: 100%; text-align: center">
                            <input type="submit" name="start" id="start" value="Start Shopping!" class="input_button">
                        </form>
                    </div>
                </div>
            </div>
        </header>

<!--        <div style="width: 100%; height: 1000px" class="white_box"></div>-->

    </body>
</html>
