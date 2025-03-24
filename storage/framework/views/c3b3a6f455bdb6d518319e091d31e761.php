<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Submit your entry for the Gotelafrica Creative Contest">
    <title>Submit Entry - Gotelafrica Creative Contest</title>

    <!-- Preload critical assets -->
    <link rel="preload" href="/Image/gott.png" as="image">
    <link rel="preload" href="/images/logo.jpeg" as="image">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f59e0b', // yellow-500
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/logo.jpeg')); ?>" type="image/x-icon">

    <!-- Add meta tag for CSRF token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="header">
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <img src="/Image/gott.png" alt="Gotel Africa Logo" class="h-8 w-auto">
                        <h1 class="ml-2 text-xl font-bold text-gray-800">GotelAfrica</h1>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" id="menu-icon" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop menu -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
                        <a href="/about" class="text-gray-600 hover:text-gray-900">About Us</a>
                        <a href="/creative-contest" class="text-gray-600 hover:text-gray-900">SNAPSHOT</a>
                        <a href="https://wa.link/81eumj" class="text-gray-600 hover:text-gray-900">Contact US</a>
                        <a href="<?php echo e(route('login')); ?>" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Get Started</a>
                    </div>
            </div>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-center mb-8">Submit Your Entry</h1>

            <!-- Payment Instructions -->
            <div class="mb-8 p-6 bg-green-50 rounded-lg border border-green-200">
                <h2 class="text-xl font-bold mb-4 text-gray-900">Entry Fee: ₦1,000</h2>
                <p class="text-gray-700 mb-4 font-medium">Payment Instructions:</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center">
                        <span class="mr-2">•</span>Account Name: GOTELAFRICA COMPANY LIMITED
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>Bank: UBA
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>Account Number: 1027475790
                    </li>
                </ul>
            </div>

            <!-- Submission Form -->
            <form id="submissionForm" class="space-y-6" novalidate enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="space-y-6">
                    <div>
                        <label for="full_name" class="block text-base font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="full_name" name="full_name" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            autocomplete="name"
                            placeholder="Enter your full name">
                    </div>

                    <div>
                        <label for="email" class="block text-base font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            autocomplete="email"
                            placeholder="your.email@example.com">
                    </div>

                    <!-- Gender Selection -->
                <div>
                        <label for="gender" class="block text-base font-medium text-gray-700 mb-2">Gender</label>
                        <select id="gender" name="gender" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-base font-medium text-gray-700 mb-2">Address</label>
                        <textarea id="address" name="address" required rows="2"
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Enter your full address"></textarea>
                </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-base font-medium text-gray-700 mb-2">Country</label>
                        <select id="country" name="country" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500">
                            <option value="">Select Country</option>
                            <option value="Nigeria" selected>Nigeria</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Angola">Angola</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Senegal">Senegal</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-base font-medium text-gray-700 mb-2">State</label>
                        <input
                            type="text"
                            id="state"
                            name="state"
                            required
                            placeholder="Enter State"
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                        >
                </div>

                <div>
                        <label for="password" class="block text-base font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500 pr-12"
                                autocomplete="new-password"
                                placeholder="Enter your password">
                            <button type="button"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-xl hover:text-gray-700"
                                onclick="togglePasswordVisibility('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                </div>

                <div>
                        <label for="password_confirmation" class="block text-base font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Confirm your password">
                </div>

                    <div>
                        <label for="phone" class="block text-base font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Enter your phone number">
                    </div>

                    <div>
                        <label for="description" class="block text-base font-medium text-gray-700 mb-2">Entry Description</label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Describe your entry here..."></textarea>
                    </div>

                <div>
                        <label for="payment_proof" class="block text-base font-medium text-gray-700 mb-2">Payment Proof</label>
                        <div class="mt-1">
                            <input type="file" id="payment_proof" name="payment_proof" accept=".jpg,.jpeg,.png,.pdf" required
                                class="block w-full text-base text-gray-700
                                file:mr-4 file:py-3 file:px-6
                                file:rounded-lg file:border-0
                                file:text-base file:font-medium
                                file:bg-yellow-500 file:text-white
                                hover:file:bg-yellow-600
                                cursor-pointer">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Accepted formats: JPG, JPEG, PNG, PDF</p>
                    </div>
                </div>

                <div class="space-y-4 pt-6">
                <button type="submit"
                        class="w-full flex justify-center py-4 px-6 border border-transparent rounded-lg shadow-md text-base font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">
                    Submit Entry
                </button>

                    <a href="https://gotelafrica.com"
                        class="w-full flex justify-center py-4 px-6 border border-transparent rounded-lg shadow-md text-base font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                    Back to Main Page
                </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Optimized JavaScript -->
    <script>
        // Defer loading of SweetAlert
        const loadSweetAlert = () => {
            return new Promise((resolve) => {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                script.onload = resolve;
                document.head.appendChild(script);
            });
        };

        // Password visibility toggle
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Form submission handling
        document.getElementById('submissionForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            await loadSweetAlert();

            const form = e.target;
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const formData = new FormData(form);

            try {
            Swal.fire({
                title: 'Submitting...',
                text: 'Please wait while we process your entry',
                allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
            });

                // Add CSRF token to headers
                const response = await fetch('<?php echo e(route("submit-entry")); ?>', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json' // Add this to ensure JSON response
                    },
                    body: formData,
                    credentials: 'same-origin' // Add this to include cookies
                });

                // First log the raw response for debugging
                const responseText = await response.text();
                console.log('Raw server response:', responseText);

                // Try to parse the response
                let result;
                try {
                    result = JSON.parse(responseText);
                } catch (e) {
                    console.error('Failed to parse server response:', e);
                    throw new Error('Server returned invalid JSON response');
                }

                if (!response.ok) {
                    throw new Error(result.message || 'Server returned an error response');
                }

                    Swal.fire({
                        icon: 'success',
                        title: 'Submission Successful!',
                        text: 'Your entry has been submitted successfully.',
                        confirmButtonColor: '#f59e0b'
                    }).then(() => {
                    if (result.redirect) {
                        window.location.href = result.redirect;
                    }
                });
            } catch (error) {
                console.error('Submission error:', error);
                console.error('Full error details:', {
                    message: error.message,
                    stack: error.stack
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed',
                    text: error.message || 'Failed to submit your entry. Please try again.',
                    confirmButtonColor: '#f59e0b'
                });
            }
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/apply.blade.php ENDPATH**/ ?>