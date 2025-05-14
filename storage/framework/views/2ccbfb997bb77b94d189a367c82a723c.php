<!DOCTYPE html>
<html>
<head>
    <title>Withdrawal Request Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333; text-align: center; margin-bottom: 20px;">Withdrawal Request Confirmation</h2>

        <p>Hello <?php echo e($user->name); ?>,</p>

        <p>Your withdrawal request has been received and is being processed. Here are the details:</p>

        <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p><strong>Amount:</strong> ₦<?php echo e(number_format($withdrawal->amount, 2)); ?></p>
            <p><strong>Bank Name:</strong> <?php echo e($withdrawal->bank_name); ?></p>
            <p><strong>Account Number:</strong> <?php echo e($withdrawal->account_number); ?></p>
            <p><strong>Account Name:</strong> <?php echo e($withdrawal->account_name); ?></p>
            <p><strong>Request Date:</strong> <?php echo e($withdrawal->created_at->format('F j, Y H:i:s')); ?></p>
        </div>

        <p>Your withdrawal will be processed within 24-72 hours. You will receive another email once the payment has been completed.</p>

        <p>If you did not make this withdrawal request, please contact our support team immediately.</p>

        <p style="margin-top: 30px; font-size: 12px; color: #666; text-align: center;">
            This is an automated email, please do not reply.
        </p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/emails/withdrawal-notification.blade.php ENDPATH**/ ?>