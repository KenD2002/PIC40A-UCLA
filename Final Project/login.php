#!/usr/local/bin/php
<?php
  session_save_path(__DIR__ . '/sessions/');
  session_name('myWebpage');
  session_start();

  $incorr_password = false;

  if (isset($_POST['password']))
  {
    validate($_POST['password'], $incorr_password);
  }

  function validate($submiss, &$incorr_password)
  {
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);
    fclose($file);

    $submiss = trim($submiss);
    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) 
    {
      $_SESSION['loggedin'] = false;
      $incorr_password = true;
    }
    else
    {
      $_SESSION['loggedin'] = true;
      header('Location: index.php');
      exit;
    }
  }
?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <title> Login </title>
        <link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
        <script src="login.js" defer></script>
        <script src="username.js" defer></script>
    </head>
  
    <body>
        <header>
            <h1 id="login_header">Welcome! Ready to check out my webpage?</h1>
        </header>

        <main>
            <section>
                <h2>Enter a username.</h2>
                <p>So that you can make your own posts and purchases, select a username and password.</p>

                <form id="login_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <br>
                    <button type="submit" value="Login" id="submit_button">Login</button>
                </form>

            </section>

            <?php
                if ($incorr_password)
                {
                    echo '<p>Invalid password!</p>';
                }
            ?>
        </main>

  
    <footer>
        <hr>
        &copy; Ken Deng, 2024
    </footer>
   
    </body>

</html>