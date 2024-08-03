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
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <title> Our Merchandise </title>
    </head>

    <body>
        <header>
            <h1>Our Merchandise</h1>
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

                <p>

                </p>

                <table>
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=3709&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Porsche" width="200">
                                    <br>
                                    <figcaption><h3>Prosche</h3></figcaption>
                                </figure>
                                <input type = "checkbox"><span></span>
                                <p>Some cool sports car in black.</p>
                            </td>
                            
                            <td>
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Ferrari" width="200">
                                    <br>
                                    <figcaption><h3>Ferrari</h3></figcaption>
                                </figure>
                                <input type = "checkbox"><span></span>
                                <p>Some fantastic red car for a cheap price.</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=3825&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Benz" width="200">
                                    <br>
                                    <figcaption><h3>Benz</h3></figcaption>
                                </figure>
                                <input type = "checkbox"><span></span>
                                <p>Crimson Benz you must want.</p>
                            </td>
    
                            <td>
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1542362567-b07e54358753?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="McLaren" width="200">
                                    <br>
                                    <figcaption><h3>McLaren</h3></figcaption>
                                </figure>
                                <input type = "checkbox"><span></span>
                                <p>Why hesitate for a silver McLaren?</p>
                            </td>
                        </tr>
                        

                    </tbody>
                    <tfoot></tfoot>
                </table>

                <fieldset>
                    <label for="coupon">Coupon code: </label>
                    <input type="text" id="coupon" name="coupon">
                    <br>
                    <button id="Checkout">Checkout</button>
                    <p></p>
                </fieldset>
            </section>

        </main>

        <footer>
            <hr>
            <small>&copy; Ken Deng, 2024</small>
        </footer>
    </body>

</html>
