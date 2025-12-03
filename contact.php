<!DOCTYPE html>
<html lang="en">
    <?php
    // browser rpoerting, turn off when we lalunch
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <title>Morito Rin Portfolio Contact</title>
</head>
<body>
    <header>
        <h1 class="hidden">Rin Morito Portofolio Contact Page</h1>
        <div class="grid-con">
            <h2 class="hidden">Header Navigation</h2>
            <a href="index.html" class="col-start-1 col-span-1 m-col-start-1 m-col-end-2">
                <img src="images/logo.svg" alt="logo" id="header-logo">
            </a>


            <input type="checkbox" id="hamburger">
            <div id="mob-menu" class="col-start-4 col-end-5 m-col-auto">
            <label for="hamburger" id="menu-show">
                <img src="images/menu-bar.svg" alt="hamburger menu bar" class="hamburger-menu-bar">
            </label>
            </div>

            <div id="header-nav" class="m-col-start-4 m-col-end-13 l-col-start-5 l-col-end-13">
                <label for="hamburger" id="header-nav-close">X</label>
                <nav>
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="work.html">WORKS</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

     <section id="contact">

        <div class="grid-con">
        <h2 class="hidden">Contact form</h2>
        <h3 class="col-span-full">Let's work Together!</h3>
        <p class="col-span-full" id="sub-title">Turning your ideas into reality</p>
        </div>
        <?php
if(isset($_GET['msg'])) {
    echo '
    <div id="succsess-bg" class="full-width-grid-con">
        <div id="success-box" class="grid-con">
            <div id="success-icon" class="col-start-1 col-span-1 m-col-start-4 m-col-end-6 l-col-start-4 l-col-span-2">
            <img src="images/sucsess.svg" alt="success icon">
            </div>
            <div id="success-text" class="col-start-2 col-end-5 m-col-start-6 m-col-end-10 l-col-start-6 l-col-end-10">
                <p id="success-title">Message sent!</p>
                <p id="success-detail">' . nl2br(htmlspecialchars($_GET['msg']) ). '</p>
            </div>
            <div id="success-close-btn" class="col-span-full">
                <a href="index.php">Back to home</a>
            </div>
        </div>
    </div>';
}
?>
            <?php
            if(isset($_GET['error'])) {
                echo '
                <div id="bg">
                <div id="error-box">
                <div> <img src="images/error.svg" alt="error icon">
                </div>
                <div id="error-text">
                <p id="error-title">Error!</p>
                <p id="error-detail">Please make sure to fill up all sections</p>
                </div>
    
                <div id="error-close-btn">
                <a href="contact.php">x</a>
                </div>
                </div>
                </div>';
}

?>
            <div id="contactform-box">
            <form method="post" action="includes/send.php" class="grid-con">

                <div class="col-span-full m-col-start-3 m-col-end-11 l-col-start-2 l-col-end-7">
                    <h4 class="hidden">Name input</h4>
                    <label for="name" class="input-title">Name</label>
                    <input type="text" id="name" name="name" class="input-box" placeholder="First Name & Last">

                <h4 class="hidden">Email input</h4>
                <label for="email" class="input-title">Email</label>
                <input type="text" id="email" name="email" class="input-box" placeholder="Enter Email">
                <h4 class="hidden">Offer option checkbox</h4>
                    <label for="service" class="input-title">What I offer</label>
                    <select id="service" name="service" class="input-box" aria-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="branding">Branding</option>
                        <option value="web-design">Web Design</option>
                        <option value="web-development">Web Development</option>
                        <option value="others">Others</option>
                    </select>
                </div>


                <div class="col-span-full m-col-start-3 m-col-end-11 l-col-start-7 l-col-end-12">
                <h4 class="hidden">Message input</h4>
                <label for="message" class="input-title">Project Details</label>
                <textarea id="message" name="message" rows="12" cols="50"
                    placeholder="Tell me more about the project(Vision, Scope/Program & Schdule)"></textarea>
                </div>

                <input type="submit" value="Submit" id="submit-btn" class="col-span-full m-col-start-5 m-col-end-9">
</form>
        </div>
    </section>

    <footer>
        <div class="grid-con">
            <h2 class="hidden">Footer Navigation</h2>
            <div class="col-span-full m-col-start-2 m-col-end-6 l-col-start-2 l-col-end-6">
                <a href="index.html">
                    <img src="images/logo.svg" alt="logo" id="footer-logo">
                </a>
                <p id="footer-text">From sketch to screen, I make it move.</p>
            </div>
            
            <nav id="footer-nav" class="col-span-full m-col-start-8 m-col-end-13 l-col-start-7 l-col-end-13">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="work.html">WORK</a></li>
                    <li><a href="about">ABOUT</a></li>
                    <li><a href="contact">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>