<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333; text-align: center; margin-bottom: 20px;">OTP Verification</h2>

        <p>Hello <?php echo e($user->name); ?>,</p>

        <p>Your OTP for setting up withdrawal password is:</p>

        <div style="background: #f8f9fa; padding: 15px; text-align: center; border-radius: 5px; margin: 20px 0;">
            <h1 style="color: #28a745; margin: 0; letter-spacing: 5px;"><?php echo e($otp); ?></h1>
        </div>

        <p>This OTP will expire in 15 minutes.</p>

        <p>If you didn't request this OTP, please ignore this email.</p>

        <p style="margin-top: 30px; font-size: 12px; color: #666; text-align: center;">
            This is an automated email, please do not reply.
        </p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\emails\otp-mail.blade.php ENDPATH**/ ?>