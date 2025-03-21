<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Entry - Gotelafrica Creative Contest</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <!-- Favicon -->
    <link rel="icon" href="/images/logo.jpeg" type="image/x-icon">

     <!-- Scripts -->
     <link rel="stylesheet" href="./css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="bg-gray-50 min-h-screen">
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
                <li><a href="{{ route(name: 'login') }}"><button class="btn">Get Started</button></a></li>
            </ul>
        </nav>

    </header>
    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-center mb-8">Submit Your Entry</h1>

            <!-- Payment Instructions -->
            <div class="mb-8 p-4 bg-green-50 rounded-lg">
                <h2 class="text-xl font-semibold mb-4 text-black font-extrabold">Entry Fee: ₦10,000</h2>
                <p class="mb-4">Payment Instructions:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Account Name: GOTELAFRICA COMPANY LIMITED</li>
                    <li>Bank: UBA</li>
                    <li>Account Number: 1027475790</li>
                </ul>
            </div>

            <!-- Submission Form -->
            <form id="submissionForm" class="space-y-6">
                <div>
                    <label class="block text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="full_name" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Phone Number</label>
                    <input type="text" name="phone" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Entry Description</label>
                    <textarea name="description" rows="4" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-500"></textarea>
                </div>



                <div>
                    <label class="block text-gray-700 mb-2">Payment Proof</label>
                    <input type="file" name="payment_proof" accept=".jpg,.jpeg,.png,.pdf" required
                        class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-white hover:file:bg-yellow-600">
                </div>

                <button type="submit"
                    class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 transition font-semibold">
                    Submit Entry
                </button>
                 <!-- Back to Main Page Button -->
                <a href="https://gotelafrica.com" class="w-full bg-black text-white py-3 px-6 text-center rounded-lg hover:bg-yellow-600 transition font-semibold inline-block">
                    Back to Main Page
                </a>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('submissionForm').addEventListener('submit', async (e) => {
            e.preventDefault(); // Prevent default form submission

            const form = e.target;
            const formData = new FormData(form);

            // Show loading state
            Swal.fire({
                title: 'Submitting...',
                text: 'Please wait while we process your entry',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const response = await fetch('submit-controller.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Submission Successful!',
                        text: 'Your entry has been submitted successfully.',
                        confirmButtonColor: '#f59e0b'
                    }).then(() => {
                        window.location.href = `submission-success.html?submission_id=${result.submission_id}`;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: result.message || 'Please check your submission and try again',
                        confirmButtonColor: '#f59e0b'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'Failed to connect to the server. Please check your internet connection.',
                    confirmButtonColor: '#f59e0b'
                });
            }
        });
    </script>
</body>
</html>