#!/usr/local/bin/php
<?php
header('Content-Type: text/plain; charset=utf-8');


    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        echo 'Either the user or credit was not posted.';
        exit;
    }


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

    $credit = $_POST['credit'];
    
    $statement = 'UPDATE users SET credit = '.$credit.' WHERE username = \''.$username.'\'';
    $db->exec($statement);

    $db->close();
?>