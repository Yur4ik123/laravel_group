<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/main_styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1>OKSANA KHORIEVA</h1>
        </div>
        <button class="burger-btn" id="burgerBtn" aria-label="Toggle menu">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>

        <nav class="nav" id="navMenu">
            <ul>
                <li class="menu"><a href="#home">Home</a></li>
                <li class="menu"><a href="#about">About</a></li>
                <li class="menu"><a href="#services">Services</a></li>
                <li class="menu"><a href="#contacts">Contacts</a></li>
            </ul>
        </nav>
        <div class="overlay" id="overlay"></div>
    </header>

    <section id="home">
        <div class="home-margin-top"></div>
        <div class="main-face">
            <div class="home-text">
                <h2>Flawless waxing</h2>
                <p>Experience the best in hair removal</p>
                <a href="#services"><button type="button">view services</button></a>

            </div>
        </div>
    </section>

    <section id="about">
        <div class="about-text">

            <h2>About me</h2>
            <span>beautiful and unique</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam autem cum cupiditate
                debitis dignissimos dolor dolores ea earum eveniet, explicabo
                facere facilis hic illum impedit incidunt iste molestias
                necessitatibus nobis non numquam pariatur possimus quo, ratione,
                recusandae repellat reprehenderit repudiandae saepe sapiente sint
                tempore ullam vel veniam voluptates voluptatibus.
            </p>
        </div>
        <div class="about-img">
            <img src="images/about-me.jpg" alt="">
        </div>
    </section>

    <section id="services">
        <div>
            <p>Smooth & silky</p>
            <h2>Select your service for more detailed information</h2>
        </div>
        <div class="cards">
            <div class="service-card">
                <a href="#home">
                    <img src="images/service1.jpg" alt="service1">
                    <h3>Very interesting service</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, illo.</p>
                </a>

            </div>
            <div class="service-card">
                <a href="#home">
                    <img src="images/service2.jpg" alt="service2">
                    <h3>Very interesting service</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, illo.</p>
                </a>
            </div>
        </div>
    </section>
    
    <section id="contacts">
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="10" rows="5"></textarea>
                <button type="submit" class="submit-message">Submit</button>
            </form>
        </div>
        <div class="other-contacts">
            <a href="https://google.com" target="_blank">
                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/telegram.svg"
                     alt="Telegram"
                     style="width:60px; height:60px; margin-right:10px;">
            </a>
            <a href="https://google.com" target="_blank">
                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/viber.svg"
                     alt="Viber"
                     style="width:60px; height:60px;">
            </a>
        </div>
    </section>
    <script src="JS/burger.js"></script>
</body>
</html>