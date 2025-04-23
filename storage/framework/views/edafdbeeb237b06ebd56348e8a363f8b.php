<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Approved</title>
</head>
<body>
    <h1>Deposit Approved</h1>
    <p>Hello <?php echo e($user->name); ?>,</p>
    <p>Your deposit of <strong>₦<?php echo e(number_format($transaction->balance, 2)); ?></strong> has been approved.</p>
    <p>Thank you for using our service.</p>
    <p>Best regards,<br><?php echo e(config('app.name')); ?></p>
</body>
</html><?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\emails\deposit_approved.blade.php ENDPATH**/ ?>