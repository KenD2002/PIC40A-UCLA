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
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Our Posts</title>
        <link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
    </head>

    <body>
        <header>
        <h1 class="page_header">Blog posts</h1>
        <nav class="page_list">
            <ul>
                <li><a class="other_page" href="index.php">Home</a></li>
                <li><a class="other_page" href="login.php">Login</a></li>
                <li class="current_page">Our Post</a></li>
                <li><a class="other_page" href="merch.php">Our Products</a></li>
            </ul>
        </nav>
        </header>

        <main>

            <form id="post_form" method="POST" action="./post.php">

                <label for="author">Author: </label>
                <input id="author" type="text" name="author" value="<?php if(isset($_COOKIE['username']))
                                                                            {
                                                                                echo $_COOKIE['username'];
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "";
                                                                            }?>">

                <br>

                <label for="content">Content: </label>
                <br>
                <textarea id="content" name="content"></textarea>

                <input type="submit" value="Post">
            </form>

            <section>
                <h2>Posts by other users:</h2>

                <?php
                    $file = @fopen('posts.txt', 'r');

                    if ($file) {
                        echo '<p>';
                        $is_author = TRUE;

                        while (!feof($file))
                        {
                            $line = fgets($file);
                            if($line == "")
                            {
                                break;
                            }
                            if($is_author)
                            {
                                echo '<p> <b>', $line, '</b> says: ';
                            }
                            else
                            {
                                echo $line, '</p>';
                            }

                            $is_author = !$is_author;
                        }

                        echo '</p>';
                        fclose($file);
                    }
                ?>

            </section>

        </main>

        <footer>
            <hr>
            &copy; Ken Deng, 2024
        </footer>
    </body>

</html>
