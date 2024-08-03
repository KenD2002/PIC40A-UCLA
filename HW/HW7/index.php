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
        <title> HW1_index </title>
    </head>

    <body>
        <header>
            <?php echo '<p>Hello, ', $_COOKIE['username'], '</p><br>';?>
            <span id="greeting"></span>
            <h1>Want Some Band?</h1>
        </header>

        <main>
            <section>
                <h2>Maybe <i>Pink Floyd</i> ?</h2>
            </section>

            <figure>
                <img
                    class="image" 
                    src="https://upload.wikimedia.org/wikipedia/en/d/d6/Pink_Floyd_-_all_members.jpg" 
                    alt="Pink Floyd - All Members">
                <figcaption>Pink Floyd - All Members</figcaption>
            </figure>

            <section>
                <h3>Description:</h3>
                <p><b>Pink Floyd</b> are an English rock band formed in London in 1965. Gaining an early following as one of the first British psychedelic groups, they were distinguished by their extended compositions, sonic experiments, philosophical lyrics and elaborate live shows. They became a leading band of the progressive rock genre, cited by some as the greatest progressive rock band of all time.</p>
            </section>

            <section>
                <h3>Discography:</h3>
                <ul>
                    <li>The Piper at the Gates of Dawn, <i>Released: 4 August 1967</i></li>
                    <li>A Saucerful of Secrets, <i>Released: 28 June 1968</i></li>
                    <li>Soundtrack From The Film More, <i>Released: 13 June 1969</i></li>
                    <li>Ummagumma, <i>Released: 7 November 1969</i></li>
                    <li>Atom Heart Mother, <i>Released: 2 October 1970</i></li>
                    <li>Meddle, <i>Released: 5 November 1971</i></li>
                    <li>Obscured by Clouds, <i>Released: 2 June 1972</i></li>
                    <li>The Dark Side of the Moon, <i>Released: 1 March 1973</i></li>
                    <li>Wish You Were Here, <i>Released: 12 September 1975</i></li>
                    <li>Animals, <i>Released: 21 January 1977</i></li>
                    <li>The Wall, <i>Released: 30 November 1979</i></li>
                    <li>The Final Cut, <i>Released: 21 March 1983</i></li>
                    <li>A Momentary Lapse of Reason, <i>Released: 7 September 1987</i></li>
                    <li>The Division Bell, <i>Released: 28 March 1994</i></li>
                    <li>The Endless River, <i>Released: 10 November 2014</i></li>
                </ul>
            </section>

            <section>
                <h3>Some recent posts by other users:</h3>
                <p><b>haha777</b> says: Good day fella.</p>
                <p><b>malicious666</b> says: Could anyone see how I can fix my scarf? Please help. I'm so sad. Here's a picture of the other side.</p>
            </section>


        </main>

        <footer>
            <hr>
            <small>&copy; Ken Deng, 2024</small>
        </footer>
    </body>

</html>
