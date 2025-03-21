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
                <li><a href="{{ route(name: 'login') }}"><button class="btn">Get Started</button></a></li>
            </ul>
        </nav>

    </header>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-green-500 to-blue-500 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-bold mb-4">Gotelafrica Creative Contest</h1>
            <p class="text-lg mb-6">Unleash Your Creativity and Win Big!</p>
            <a class="bg-yellow-500 text-black font-semibold py-2 px-6 rounded-full shadow-lg hover:bg-yellow-600 transition" href="{{ route('apply') }}">Submit Your Entry</a>
        </div>
    </section>

   <!-- Poem Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 flex flex-col lg:flex-row items-center justify-between gap-12">
        <!-- Poem Text -->
        <div class="italic text-lg text-gray-800 lg:w-1/2">
            <blockquote class="space-y-4">
                "Enter the Gotelafrica Creative Contest and showcase your artistic skills! Download the Bull  image and create something unique and amazing using your own creativity."
            </blockquote>
        </div>

        <!-- Image and Download Button -->
        <div class="flex flex-col items-center gap-6 lg:w-1/2">
            <img src="/download/bull.jpeg" alt="Mighty bull representing contest spirit"
                 class="w-full max-w-md rounded-lg shadow-lg hover-scale" loading="lazy">
            <a class="bg-yellow-500 text-black font-semibold py-2 px-6 rounded-full shadow-lg hover:bg-yellow-600 transition"
               href="/download/bull.jpg" download="bull.jpg">
               Download Bull Image
            </a>
        </div>
    </div>
</section>

    <!-- Contest Details Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Contest Details</h2>
            <div class="grid md:grid-cols-2 gap-8 text-gray-700">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">How to Participate</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Download the Bull image.</li>
                        <li>Create something unique using the image.</li>
                        <li>Submit your entry before the deadline.</li>
                    </ol>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">Who can Participate</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Artists</li>
                        <li>Tailors</li>
                        <li>Furniture Designers</li>
                        <li>Writers</li>
                        <li>Photographers</li>
                        <li>Caterers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Prizes Section -->
    <section class="bg-gray-100 py-20 text-center">
        <h2 class="text-3xl font-bold text-yellow-500 mb-8">Prizes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto px-4">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold text-gray-800 mb-4">First Winner</h4>
                <p class="text-xl font-semibold text-gray-900">₦1,500,000</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold text-gray-800 mb-4">Second Winner</h4>
                <p class="text-xl font-semibold text-gray-900">₦1,000,000</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition">
                <h4 class="text-2xl font-bold text-gray-800 mb-4">Third Winner</h4>
                <p class="text-xl font-semibold text-gray-900">₦500,000</p>
            </div>
        </div>
    </section>

    <!-- Key Dates Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Key Dates</h2>
            <div class="grid md:grid-cols-3 gap-8 text-gray-700">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">Submission Starts</h3>
                    <p class="text-lg">19th April 2025</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">Voting Starts</h3>
                    <p class="text-lg">20th April 2025</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">Winners Announcement</h3>
                    <p class="text-lg">29th April 2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gray-100 py-20 text-center">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Ready to Participate?</h2>
            <p class="text-lg mb-6">Download the Bull image and start creating your entry today!</p>
            <a class="bg-yellow-500 text-black font-semibold py-2 px-6 rounded-full shadow-lg hover:bg-yellow-600 transition" href="/download/bull.jpg" download="bull.jpg">Download Bull Image</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-8">
                <a href="https://www.facebook.com/share/1BcVwQkKMe/?mibextid=qi2Omg" class="hover:text-yellow-400"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="https://youtube.com/@michaelchidubem1928?si=zpnetXqtkZEY4cIx" class="hover:text-yellow-400"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
            <p class="mb-4">Questions? <a href="mailto:contest@gotelafrica.com" class="text-yellow-400 hover:underline">contest@gotelafrica.com</a></p>
            <p class="text-sm">Phone Number: +234 816 020 7731</p>
            <p class="text-sm">By participating, you agree to our <a href="/terms" class="text-yellow-400 hover:underline">Terms & Conditions</a></p>
            <p class="mt-8">Take the Bull by the Horn and make your mark!</p>
            <p class="mt-8">Proudly Sponsored by Amana Group Ltd</p>
        </div>
    </footer>

</body>
</html>