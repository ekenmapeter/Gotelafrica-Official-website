<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Join the Gotelafrica Creative Contest: Unstoppable Charge. Showcase your creativity for a chance to win exciting prizes.">
    <meta name="keywords" content="Gotelafrica, Creative Contest, Unstoppable Charge, Contest Prizes, Africa Poetry Contest, Artistic Competition">
    <meta name="author" content="Gotelafrica">
    <meta property="og:title" content="Gotelafrica Creative Contest: Unstoppable Charge">
    <meta property="og:description" content="Join the Gotelafrica Creative Contest: Unstoppable Charge. Showcase your creativity for a chance to win exciting prizes.">
    <meta property="og:image" content="/images/contest.jpeg">
    <meta property="og:url" content="https://gotelafrica.com/contest">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Gotelafrica Creative Contest: Unstoppable Charge">
    <meta name="twitter:description" content="Join the Gotelafrica Creative Contest: Unstoppable Charge. Showcase your creativity for a chance to win exciting prizes.">
    <meta name="twitter:image" content="/images/contest.jpeg">
    <title>Gotelafrica Creative Contest: Unstoppable Charge</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="/images/logo.jpeg" type="image/x-icon">


     <!-- Scripts -->
     <link rel="stylesheet" href="./css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9764183583019968"
     crossorigin="anonymous"></script>
</head>
<body class="font-sans bg-gray-50">
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
                <li><a href="/creative-contest">SNAPSHOT</a></li>
                <li><a href="https://wa.link/81eumj">Contact US</a></li>
                <li><a href="<?php echo e(route(name: 'login')); ?>"><button class="btn">Get Started</button></a></li>
            </ul>
        </nav>

    </header>
    <!-- Hero Section -->
    <section class="relative overflow-hidden min-h-screen">
        <!-- Background Video -->
        <video
            autoplay
            muted
            loop
            playsinline
            class="absolute w-full h-full object-cover"
            preload="auto"
        >
            <source src="<?php echo e(asset('images/gotelafrica.mp4')); ?>" type="video/mp4">
        </video>

        <!-- Optimized gradient overlays -->
        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/60 via-blue-500/50 to-green-500/60 backdrop-blur-sm"></div>

        <!-- Content -->
        <div class="relative z-10 text-center py-20 px-4 text-white container mx-auto">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg animate-fade-in">
                    Become Master or Miss<br>Gotelafrica 2025<br>Episode 1
                </h1>


                <!-- Button Group -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">


                     <a href="<?php echo e(route('apply')); ?>"
                       class="bg-yellow-500 text-black font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-yellow-600 transition-all duration-300 transform hover:scale-105">
                        Submit Your Entry
                    </a>
                </div>
            </div>
        </div>
    </section>





    <!-- Prizes Section -->
    <section class="bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 py-20 text-center">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-white mb-4">Take Your Shot at Glory!</h2>
            <p class="text-xl text-yellow-400 mb-12">Share your Best Outfit and collect votes to win Big</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- First Prize -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-xl hover:transform hover:scale-105 transition-all duration-300 border border-yellow-500/30">
                    <div class="text-yellow-400 text-5xl mb-4">🏆</div>
                    <h4 class="text-2xl font-bold text-white mb-2">First Prize</h4>
                    <p class="text-3xl font-bold text-yellow-400 mb-2">₦50,000</p>
                    <p class="text-white">Grand Winner</p>
                </div>

                <!-- Second Prize -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-xl hover:transform hover:scale-105 transition-all duration-300 border border-silver-500/30">
                    <div class="text-gray-200 text-5xl mb-4">🥈</div>
                    <h4 class="text-2xl font-bold text-white mb-2">Second Prize</h4>
                    <p class="text-3xl font-bold text-gray-200 mb-2">₦25,000</p>
                    <p class="text-white">Runner Up</p>
                </div>

                <!-- Third Prize -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-xl hover:transform hover:scale-105 transition-all duration-300 border border-bronze-500/30">
                    <div class="text-yellow-600 text-5xl mb-4">🥉</div>
                    <h4 class="text-2xl font-bold text-white mb-2">Third Prize</h4>
                    <p class="text-3xl font-bold text-yellow-600 mb-2">₦15,000</p>
                    <p class="text-white">Second Runner Up</p>
                </div>
            </div>

            <!-- Bonus Prize -->
            <div class="bg-yellow-500/20 backdrop-blur-md p-8 rounded-2xl shadow-xl max-w-2xl mx-auto">
                <h4 class="text-2xl font-bold text-white mb-4">Special Bonus Prize! 🎉</h4>
                <p class="text-xl text-white mb-2">First 10 Participants</p>
                <p class="text-3xl font-bold text-yellow-400">₦2,000 Each</p>
                <p class="text-white mt-2">Don't wait, participate early!</p>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-8">
                <a href="https://www.facebook.com/share/1BcVwQkKMe/?mibextid=qi2Omg" class="hover:text-yellow-400"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="https://youtube.com/@michaelchidubem1928?si=zpnetXqtkZEY4cIx" class="hover:text-yellow-400"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
            <p class="mb-4 text-white">Questions? <a href="mailto:contest@gotelafrica.com" class="text-yellow-400 hover:underline">contest@gotelafrica.com</a></p>
            <p class="text-sm text-white">Phone Number: +234 816 020 7731</p>
            <p class="text-sm text-white">By participating, you agree to our <a href="/terms" class="text-yellow-400 hover:underline">Terms & Conditions</a></p>
            <p class="mt-8 text-white">Take the Bull by the Horn and make your mark!</p>
            <p class="mt-8 text-white">Proudly Sponsored by Amana Group Ltd</p>
        </div>
    </footer>

</body>
</html><?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/gotelafrica_creative_contest.blade.php ENDPATH**/ ?>