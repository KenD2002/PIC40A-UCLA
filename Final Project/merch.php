#!/usr/local/bin/php
<?php 
    session_save_path(__DIR__ . '/sessions/');
    session_name('myWebpage');
    session_start();

    if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isset($_COOKIE['username']))
    {
        header('Location: login.php');
        exit;
    }

    $username = $_COOKIE['username'];

    $db = new SQLite3('credit.db');
    $statement = 'CREATE TABLE IF NOT EXISTS users(username TEXT, credit REAL)';
    $db->exec($statement);

    $statement = 'SELECT username, credit FROM users';
    $results = $db->query($statement);

    if($results) 
    {
        $exists = FALSE;
        while ($row = $results->fetchArray()) 
        {
            if($row['username'] === $username)
            {
                $exists = TRUE;
            }
        }
    }

    if(!$exists)
    {
        $statement = 'INSERT INTO users (username, credit) VALUES (\''.$username.'\', 20)';
        $db->exec($statement);
        $credit = 20;
    }
    else
    {
        $statement = 'SELECT username, credit FROM users';
        $results = $db->query($statement);
        while ($row = $results->fetchArray()) 
        {
            if($row['username'] === $username)
            {
                $credit = $row['credit'];
            }
        }
    }

    $db->close();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <title> Our Merchandise </title>
        <link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
        <script src="merch.js?v=<?php echo rand(); ?>" defer></script>
    </head>

    <body>
        <header>
            <h1 class="page_header">Our Merchandise</h1>
            <nav class="page_list">
                <ul>
                    <li><a class="other_page" href="index.php">Home</a></li>
                    <li><a class="other_page" href="login.php">Login</a></li>
                    <li><a class="other_page" href="blog.php">Our Post</a></li>
                    <li class="current_page">Our Products</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section>
                <h2>Some Cars for Sale</h2>

                <p>
                    Please have a look around. Our new members are awarded with $20,00 in credit.
                    You can add credit at anytime with a coupon code. When you want to make
                    a purchase, please select the checkboxes of the items you wish to purchase and
                    click the "Checkout" button below.
                </p>

                <p id="current_credit">
                    <?php
                        echo "Your Credit: $", number_format($credit, 2, '.', '');
                    ?>
                </p>

                <table id="product_table">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td class="product_box">
                                <figure>
                                    <img class="product_img" src="https://www.stuttcars.com/wp-content/uploads/2021/12/porsche-911-carrera-15_1600x0.webp" alt="Porsche">
                                    <figcaption class="product_caption">Prosche</figcaption>
                                </figure>
                                <div class="price"> <input type = "checkbox"><span class="price_amount"></span> </div>
                                <p class="description">Some cool sports car in black. Buy it now!</p>
                            </td>
                            
                            <td class="product_box">
                                <figure>
                                    <img class="product_img" src="https://cdn.shopify.com/s/files/1/0679/1584/1811/files/70_years_of_the_Ferrari_375_F1_victory_A_British_Grand_Prix_celebration_image_2_1.webp?v=1681738614" alt="Ferrari">
                                    <figcaption class="product_caption">Ferrari</figcaption>
                                </figure>
                                <div class="price"> <input type = "checkbox"><span class="price_amount"></span> </div>
                                <p class="description">Some fantastic red car for a cheap price.</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="product_box">
                                <figure>
                                    <img class="product_img" src="https://d.newsweek.com/en/full/2277668/mercedes-benz-concept-cla-class.jpg?w=1600&h=1600&q=88&f=c7c87d317ab941e440fefdbdefee6c43" alt="Benz">
                                    <figcaption class="product_caption">Benz</figcaption>
                                </figure>
                                <div class="price"> <input type = "checkbox"><span class="price_amount"></span> </div>
                                <p class="description">Crimson Benz you must want. You should go for it!</p>
                            </td>
    
                            <td class="product_box">
                                <figure >
                                    <img class="product_img" src="https://cdn.carbuzz.com/gallery-images/1600/617000/300/617304.jpg" alt="McLaren">
                                    <figcaption class="product_caption">McLaren</figcaption>
                                </figure>
                                <div class="price"> <input type = "checkbox"><span class="price_amount"></span> </div>
                                <p class="description">Why hesitate for a silver McLaren? Best deal ever.</p>
                            </td>
                        </tr>
                        

                    </tbody>
                    <tfoot></tfoot>
                </table>

                <fieldset id="checkout_box">
                    <label for="coupon">Coupon code: </label>
                    <input type="text" id="coupon" name="coupon">
                    <br>
                    <button id="Checkout">Checkout</button>
                    <p id="receipt"></p>
                </fieldset>
            </section>

        </main>

        <footer>
            <hr>
            &copy; Ken Deng, 2024
        </footer>
    </body>

</html>
