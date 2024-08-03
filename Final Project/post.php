#!/usr/local/bin/php
<?php
header('Content-Type: text/plain; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            echo 'post sucessfully written';

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
            echo 'Nobody has made a post.';
            exit;
        }
      ?>
