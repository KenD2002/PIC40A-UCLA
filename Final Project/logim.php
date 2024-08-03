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
        <script src="logim.js?v=<?php echo rand(); ?>" defer></script>
        <link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
    </head>
  
    <body>
        <header>
            <h1 id="login_header">Welcome! Ready to check out my webpage?</h1>
        </header>

        <main>
            <section>
                <h2>Enter a username.</h2>
                <p>So that you can make your own posts and purchases, select a username and password.</p>
                    <fieldset id="login_form">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username">
                        <br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                        <br>
                        <button value="Login" id="submit_button">Login</button>
                    </fieldset>
            </section>

        </main>

  
    <footer>
        <hr>
        &copy; Ken Deng, 2024
    </footer>
   
    </body>

</html>