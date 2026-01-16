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
<body class="dark-body">
    <a href="#main" class="skip">Skip to main content</a>
    <header class="dark-header">
        <h1 class="hidden">Rin Morito Portofolio Contact Page</h1>
        <div class="grid-con">
            <h2 class="hidden">Header Navigation</h2>
            <a href="index.html" class="col-start-1 col-span-1 m-col-start-1 m-col-end-2" aria-label="home">
                <img src="images/logo.svg" alt="logo" id="header-logo">
            </a>


            <input type="checkbox" id="hamburger">
            <div id="mob-menu" class="col-start-4 col-end-5 m-col-auto">
            <label for="hamburger" id="menu-show">
                <img src="images/menu-bar-dark.svg" alt="menu" class="hamburger-menu-bar">
            </label>
            </div>

            <div id="header-nav" class="m-col-start-4 m-col-end-13 l-col-start-5 l-col-end-13">
                <label for="hamburger" id="header-nav-close">X</label>
                <nav>
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="index.html#work-show">WORKS</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main id="main">
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
                <a href="index.html">Back to home</a>
            </div>
        </div>
    </div>';
}
?>
            <?php
            if(isset($_GET['error'])) {
                echo '
                <div id="error-box">
                <div> <img src="images/error.svg" alt="error icon">
                </div>
                <div id="error-text">
                <p id="error-title">Error!</p>
                <p id="error-detail">' . htmlspecialchars($_GET['error'] ?? '') . '</p>
                </div>
                </div>';
}



?>
            <div id="contactform-box">
            <form method="post" action="includes/send.php" class="grid-con">

                <div class="col-span-full m-col-start-3 m-col-end-11 l-col-start-2 l-col-end-7">
                    <h4 class="hidden">Name input</h4>
                    <label for="name" class="input-title">Name</label>
                    <?php
                    if (isset($_GET['name'])) {
                        $name_value = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $name_value = '';
                    }
                    ?>
                    <input type="text" id="name" name="name" class="input-box" placeholder="First Name & Last" value="<?php echo $name_value; ?>">

                <h4 class="hidden">Email input</h4>
                <label for="email" class="input-title">Email</label>
                <?php
                    if (isset($_GET['email'])) {
                        $email_value = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $email_value = '';
                    }
                    ?>
                <input type="text" id="email" name="email" class="input-box" placeholder="Enter Email" value="<?php echo $email_value; ?>">

                <h4 class="hidden">Service option select</h4>
                    <label for="service" class="input-title">What I offer</label>
                    <?php
                    if (isset($_GET['service'])) {
                        $service_value = htmlspecialchars($_GET['service'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $service_value = '';
                    }
                    ?>
                    <select id="service" name="service" class="input-box" aria-placeholder="Please select" value="<?php echo $service_value; ?>">
                        <option value="">Please select</option>
                        <option value="branding"  <?php if ($service_value == 'branding') echo 'selected'; ?>>Branding</option>
                        <option value="web-design" <?php if ($service_value == 'web-design') echo 'selected'; ?>>Web Design</option>
                        <option value="web-development" <?php if ($service_value == 'web-development') echo 'selected'; ?>>Web Development</option>
                        <option value="others" <?php if ($service_value == 'Others') echo 'selected'; ?>>Others</option>
                    </select>
                </div>


                <div class="col-span-full m-col-start-3 m-col-end-11 l-col-start-7 l-col-end-12">
                <h4 class="hidden">Message input</h4>
                <label for="message" class="input-title">Project Details</label>
                <?php
                    if (isset($_GET['message'])) {
                        $message_value = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $message_value = '';
                    }
                    ?>
                <textarea id="message" name="message" rows="12" cols="50"
                    placeholder="Tell me more about the project(Vision, Scope/Program & Schdule)"><?php echo $message_value; ?></textarea>
                </div>

                <input type="submit" value="Submit" id="submit-btn" class="col-span-full m-col-start-5 m-col-end-9">
</form>
        </div>
    </section>
                </main>

   <footer class="dark-footer">
        <div class="grid-con">
            <h2 class="hidden">Footer Navigation</h2>
            <div id="footer-message" class="col-span-full">
              <p>Any project in your mind?</p>
              <a href="contact.php" aria-label="contact">
                Let's work together!
              </a>
            </div>

            <hr id="footer-hr" class="col-span-full">
            
            <nav id="footer-nav" class="col-span-full">
              <h3 class="visually-hidden">Fotter Links</h3>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="index.html#work-show">WORKS</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
        </div>
        <div id="contact-info" class="full-width-grid-con">
          <div class="grid-con">
              <p id="copyrights" class="col-span-full">&copy;2026 Rin Morito</p>
              <div id="icons" class="col-span-full">
                <a href="https://www.linkedin.com/in/rin-morito-7b9868329" aria-label="LinkedIn">
                  <img src="images/linkedin.svg" alt="LinkedIn icon" class="social-icon">
                </a>
                <a href="https://github.com/oiovorin" aria-label="GitHub">
                  <img src="images/github.svg" aria-label="GitHub icon" class="social-icon">
                </a>
                <a href="https://www.instagram.com/r___nn3/" aria-label="instagram">
                  <img src="images/instagram.svg" alt="instagram icon" class="social-icon">
                </a>
              </div>
            </div>
            </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/ScrollTrigger.js"></script>
    <script src="js/main.js"></script>
</body>
</html>