#!/usr/local/bin/php

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>
        /~dengken1/HW6/post.php
    </title>
  </head>

  <body>
    <header>
    </header>

    <main>
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            echo '<p style="font-family: Courier New;">post sucessfully written</p>';

            $file = fopen('posts.txt', 'a');
            $author = $_POST['author'];
            if(!$author)
            {
                $author = $_COOKIE['username'];
            }
            $content = implode('<br \>', preg_split("/\R/", $_POST['content']));

            fwrite($file, "$author\n$content\n"); #odd line authors even line contents
            fclose($file);
        }
        else
        {
            echo '<p style="font-family: Courier New;">Nobody has made a post.</p>';
        }
      ?>
    </main>

    <footer>
    </footer>
  </body>

</html>
