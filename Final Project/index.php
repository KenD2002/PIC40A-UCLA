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
        <title>Want Some Band?</title>
        <link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
    </head>

    <body>
        <header>
            <span id="greeting">
                <?php echo '<p class="greeting_text">Hello, ', $_COOKIE['username'], '!</p>';?>
                <nav class="page_list">
                    <ul>
                        <li class="current_page">Home</a></li>
                        <li><a class="other_page" href="login.php">Login</a></li>
                        <li><a class="other_page" href="blog.php">Our Post</a></li>
                        <li><a class="other_page" href="merch.php">Our Products</a></li>
                    </ul>
                </nav>
            </span>
            <h1 class="page_header">Want Some Band?</h1>
        </header>

        <main>
            <section>
                <h2>Maybe <i>Pink Floyd</i> ?</h2>
            </section>

            <figure>
                <img id="index_image"
                    class="image" 
                    src="https://upload.wikimedia.org/wikipedia/en/d/d6/Pink_Floyd_-_all_members.jpg" 
                    alt="Pink Floyd - All Members">
                <figcaption id="figcaption">Pink Floyd - All Members</figcaption>
            </figure>
            <br>
            <figure>
                <img id="index_image"
                    class="image" 
                    src="https://www.rollingstone.com/wp-content/uploads/2021/12/pink-floyd-1994.jpg" 
                    alt="Pink Floyd - Pulse Concert">
                <figcaption id="figcaption">Pink Floyd - Pulse Concert</figcaption>
            </figure>
            <br>
            <figure>
                <img id="index_image"
                    class="image" 
                    src="https://m.media-amazon.com/images/I/71LD44vUtcL._UF1000,1000_QL80_.jpg" 
                    alt="Pink Floyd - Dark Side Of The Moon Album Cover">
                <figcaption id="figcaption">Pink Floyd - Dark Side Of The Moon Album Cover</figcaption>
            </figure>
            <br>
            <figure>
                <img id="index_image"
                    class="image" 
                    src="https://i.scdn.co/image/ab67616d0000b2735d48e2f56d691f9a4e4b0bdf" 
                    alt="Pink Floyd - The Wall Album Cover">
                <figcaption id="figcaption">Pink Floyd - The Wall Album Cover</figcaption>
            </figure>
            <br>
            <section>
                <h3>Description:</h3>
                <p><b>Pink Floyd</b> are an English rock band formed in London in 1965. Gaining an early following as one of the first British psychedelic groups, they were distinguished by their extended compositions, sonic experiments, philosophical lyrics and elaborate live shows. They became a leading band of the progressive rock genre, cited by some as the greatest progressive rock band of all time.</p>
            </section>

            <section>
                <h3>Discography:</h3>
                <ul>
                    <li>The Piper at the Gates of Dawn, Released: 4 August 1967</li>
                    <li>A Saucerful of Secrets, Released: 28 June 1968</li>
                    <li>Soundtrack From The Film More, Released: 13 June 1969</li>
                    <li>Ummagumma, Released: 7 November 1969</li>
                    <li>Atom Heart Mother, Released: 2 October 1970</li>
                    <li>Meddle, Released: 5 November 1971</li>
                    <li>Obscured by Clouds, Released: 2 June 1972</li>
                    <li>The Dark Side of the Moon, Released: 1 March 1973</li>
                    <li>Wish You Were Here, Released: 12 September 1975</li>
                    <li>Animals, Released: 21 January 1977</li>
                    <li>The Wall, Released: 30 November 1979</li>
                    <li>The Final Cut, Released: 21 March 1983</li>
                    <li>A Momentary Lapse of Reason, Released: 7 September 1987</li>
                    <li>The Division Bell, Released: 28 March 1994</li>
                    <li>The Endless River, Released: 10 November 2014</li>
                </ul>
            </section>

            <section>
                <h3>Some recent posts by other users:</h3>
                <p><b>haha777</b> says: Good day fella.</p>
                <p><b>malicious666</b> says: Could anyone see how I can fix my <a href="scarf1.html" target="_blank" rel="opener">scarf</a>? Please help. I'm so sad. Here's a <a href="scarf2.html" target="_blank" rel="opener">picture</a> of the other side.</p>
            </section>


        </main>

        <footer>
            <hr>
            <small>&copy; Ken Deng, 2024</small>
        </footer>
    </body>
</html>
