<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contest Submission</title>
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
            background: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .submission-info {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .action-button {
            display: inline-block;
            padding: 12px 25px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .proof-section {
            background: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0;">🎯 New Contest Submission</h1>
            <p style="margin: 10px 0 0 0;">Submission ID: {{ $submission->id }}</p>
        </div>

        <div class="content">
            <div class="submission-info">
                <h2 style="color: #4CAF50; margin-top: 0;">Participant Details</h2>
                <p><strong>👤 Name:</strong> {{ $submission->full_name }}</p>
                <p><strong>📧 Email:</strong> {{ $submission->email }}</p>
                <p><strong>📱 Phone:</strong> {{ $submission->phone }}</p>
            </div>

            <div class="submission-info">
                <h2 style="color: #4CAF50; margin-top: 0;">Submission Description</h2>
                <p>{{ $submission->description }}</p>
            </div>

            <div class="proof-section">
                <h2 style="color: #4CAF50; margin-top: 0;">Payment Proof</h2>
                <p>
                    <a href="{{ asset('storage/uploads/' . $submission->payment_proof) }}"
                       class="action-button"
                       style="background: #4CAF50;">
                        View Payment Proof
                    </a>
                </p>
            </div>

            <center style="margin-top: 30px;">
                <a href="{{ url('/admin/submissions/' . $submission->id) }}"
                   class="action-button">
                    Review Submission
                </a>
            </center>
        </div>
    </div>
</body>
</html>