<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Gotelafrica | No 1 Job Creation App in Africa</title>

    <!-- Add new CSS links -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Meta Tags for SEO -->
    <meta name="description" content="No 1 Job Creation App in Africa | Training | Health Care | Job Creation">
    <meta name="keywords" content="Training, Health Care, Job Creation">
    <meta name="author" content="Gotelafrica">

    <!-- Open Graph Tags (Facebook) -->
    <meta property="og:title" content="Gotelafrica | No 1 Job Creation App in Africa">
    <meta property="og:description" content="No 1 Job Creation App in Africa | Training | Health Care | Job Creation">
    <meta property="og:image" content="/images/logo.jpeg">
    <meta property="og:url" content="https://gotelafrica.com">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Gotelafrica | No 1 Job Creation App in Africa">
    <meta name="twitter:description" content="No 1 Job Creation App in Africa | Training | Health Care | Job Creation">
    <meta name="twitter:image" content="/images/logo.jpeg">

    <!-- Favicon -->
    <link rel="icon" href="/images/logo.jpeg" type="image/x-icon">


    <!-- Scripts -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="/Image/gott.png" alt="Gotel Africa Logo">
                <h1>GotelAfrica</h1>
            </div>
            <div class="menu-icon" id="menu-icon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="nav-links" id="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/creative-contest">Creative Contest</a></li>
                <li><a href="https://wa.link/81eumj">Contact US</a></li>
                <li><a href="<?php echo e(route(name: 'login')); ?>"><button class="btn">Get Started</button></a></li>
            </ul>
        </nav>

    </header>
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2 class="hero-text">Welcome to GotelAfrica</h2>
            <p>Building  the future generation with Science and technology.</p>
        </div>
    </section>


    <section class="services">
        <h2>Services</h2>
        <div class="services-container">
            <div class="service-card">
                <div class="service-image">
                    <img src="./Image/brad.jpg" alt="General Printing">
                </div>
                <h3>General Printing</h3>
                <p>We offer high-quality printing services for businesses, including flyers, brochures, banners, and much more.</p>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <img src="./Image/web.jpg" alt="Web Development">
                </div>
                <h3>Web Development</h3>
                <p>Building dynamic, user-friendly websites tailored to your business needs and goals.</p>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <img src="./Image/merch.jpg" alt="General Merchandise">
                </div>
                <h3>General Merchandise</h3>
                <p>We supply a wide range of products to meet the everyday needs of your business and customers.</p>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <img src="./Image/save.jpg" alt="Investment">
                </div>
                <h3>Investment</h3>
                <p>Providing tailored investment solutions to help you grow and secure your financial future.</p>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <img src="./Image/WhatsApp Image 2024-09-17 at 22.01.51_8992b2c8.jpg" alt="Real Estate">
                </div>
                <h3>Real Estate</h3>
                <p>Helping you navigate the real estate market with our expert services in property acquisition and development.</p>
            </div>
        </div>
    </section>



<!-- Testimonial Section -->

<section class="testimonials">
    <div class="testimonial-container">
        <div class="testimonial-card">
            <img src="/Image/Dr.jpg" alt="Dr Vivian Ijem" class="testimonial-image">
            <blockquote>"Gotelafrica is the best place to invest your money and watch it grow, with Gotelafrica life has been better in this hard economy. Long live Gotelafrica"</blockquote>
            <h3>Dr Vivian Ijem</h3>
            <p>Doctor</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="/Image/Eze.jpg" alt="Ezeugo Benjamin Chijioke" class="testimonial-image">
            <blockquote>"Gotelafrica is a platform for those that desire financial autonomy. Unlike Ponzi schemes, gotelafrica is a foundation with its lifespan extended to infinity. It is a platform for financial leaders of tomorrow. Gotelafrica is a tested and trusted investment platform."</blockquote>
            <h3>Ezeugo Benjamin Chijioke</h3>
            <p>Business Man</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="/Image/ukoha.jpg" alt="Juliet Chinyere Ukoha" class="testimonial-image">
            <blockquote>"The impressive returns on my investments have exceeded my expectations, and I appreciate the regular updates and support from their dedicated team. I highly recommend their platform to anyone seeking a trustworthy and profitable investment opportunity."</blockquote>
            <h3>Juliet Chinyere Ukoha</h3>
            <p>Business Woman</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="./Image/Timi.jpg" alt="Person 4" class="testimonial-image">
            <blockquote>"In Gotel Africa 🌍 there is much life there. The best investment platform so far. Their  transparency re  notch. Invest with peace of mind.."</blockquote>
            <h3>Timileyin Grace Adeyemi</h3>
            <p>Business Woman</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="./Image/doris.jpg" alt="Person 5" class="testimonial-image">
            <blockquote>"I joined gotelafrica on 4 march 2024 6 months old now....

             Gotelafrica as I see it is not only Investment site .. but. Job opportunity to everyone

                Gotelafrica has made me smile in difficults moment like never before...."</blockquote>
            <h3>Nkolika onyebuchi Doris</h3>
            <p>Business Woman</p>
            <div class="rating">
                <span>★★★★★</span>
            </div>
        </div>
    </div>
</section>



<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4>About Us</h4>
            <p>Building  the future generation with Science and technology.</p>
        </div>
        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="https://wa.link/81eumj">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Contact Us</h4>
            <p>Email: contact@gotelafrica.com </p>
            <p>Phone: +234 816 020 7731</p>
            <p>Address: Address: Suit B2, Tahalili Complex Opposite Total Filling StationAngwan-Gede Along Jikwoyi , Kurudu Road , FCT Abuja</p>
        </div>
        <div class="footer-section">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100063805844998"><i class="fab fa-facebook-f"></i></a>
                <a href=" https://www.instagram.com/gotelafrica1"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.link/81eumj"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Gotelafrica. All rights reserved.</p>
    </div>
</footer>



    <script src="script.js"></script>

    <script>
        document.getElementById("menu-icon").addEventListener("click", function() {
            var navLinks = document.getElementById("nav-links");
            navLinks.classList.toggle("active");
        });
    </script>

</body>


<script src="./js/script.js"></script>


</html>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/welcome.blade.php ENDPATH**/ ?>