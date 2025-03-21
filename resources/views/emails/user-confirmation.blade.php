<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #FFD700;
            color: #000;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .submission-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #FFD700;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Gotelafrica Logo" style="max-width: 150px; margin-bottom: 20px;">
            <h1 style="margin: 0;">🎉 Thank You for Submitting! 🎉</h1>
        </div>

        <div class="content">
            <p style="font-size: 18px;">Dear <strong>{{ $submission->full_name }}</strong>,</p>

            <p>We're excited to have received your submission for the Gotelafrica Creative Contest! Your creative journey with us has officially begun. 🚀</p>

            <div class="submission-details">
                <h2 style="color: #FFD700; margin-top: 0;">Submission Details</h2>
                <p><strong>🎯 Submission ID:</strong> {{ $submission->id }}</p>
                <p><strong>📅 Date Submitted:</strong> {{ $submission->created_at->format('F j, Y') }}</p>
            </div>

            <p>What happens next?</p>
            <ul style="list-style-type: none; padding-left: 0;">
                <li>✅ Our team will review your submission</li>
                <li>✅ Winners will be announced on April 19, 2025</li>
                <li>✅ Stay tuned for updates via email</li>
            </ul>

            <p>Have questions? We're here to help! Feel free to reply to this email or contact our support team.</p>

            <center>
                <a href="https://gotelafrica.com/contest-status" class="btn">Track Your Submission</a>
            </center>
        </div>

        <div class="footer">
            <p>Best regards,<br><strong>The Gotelafrica Team</strong></p>
            <p style="font-size: 12px; color: #999;">
                Follow us on social media:<br>
                <a href="https://twitter.com/gotelafrica" style="color: #1DA1F2;">Twitter</a> |
                <a href="https://instagram.com/gotelafrica" style="color: #E1306C;">Instagram</a> |
                <a href="https://facebook.com/gotelafrica" style="color: #4267B2;">Facebook</a>
            </p>
        </div>
    </div>
</body>
</html>