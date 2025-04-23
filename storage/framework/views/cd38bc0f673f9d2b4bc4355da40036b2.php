<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- MESSAGE SUBJECT -->
    <title>New OTP Request</title>
</head>

<body>
    <div class="bg-green-400 rounded-lg p-8">
        <div class="text-center mb-8 flex flex-col justify-center items-center">
            <img src="<?php echo e(asset('/images/logo.png')); ?>" alt="Logo" class="w-24 h-24" />
            <h1 class="text-2xl font-semibold">New OTP Request</h1>
        </div>

        <p>Hello <?php echo e(Auth::user()->first_name); ?>,</p><br>

        <p>Your OTP Code is: <?php echo e($otp); ?></p><br>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\email\otp.blade.php ENDPATH**/ ?>