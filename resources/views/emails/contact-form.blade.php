{{-- resources/views/emails/contact-form.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; background: #f5f5f5; padding: 30px;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden;">
        <div style="background: #0a0a0a; padding: 24px 30px;">
            <h2 style="color: #ffffff; margin: 0; font-size: 18px; letter-spacing: 0.05em;">NEW CONTACT MESSAGE</h2>
        </div>
        <div style="padding: 30px;">
            <p style="margin: 0 0 16px; color: #555;">
                <strong style="color: #111;">Name:</strong> {{ $senderName }}
            </p>
            <p style="margin: 0 0 16px; color: #555;">
                <strong style="color: #111;">Email:</strong> {{ $senderEmail }}
            </p>
            <p style="margin: 0 0 16px; color: #555;">
                <strong style="color: #111;">Subject:</strong> {{ $contactSubject ?? $subject }}
            </p>
            <p style="margin: 0 0 8px; color: #111;"><strong>Message:</strong></p>
            <div style="background: #f9f9f9; padding: 16px; border-left: 3px solid #B22222; color: #333; line-height: 1.6;">
                {{ $messageContent }}
            </div>
        </div>
        <div style="padding: 16px 30px; background: #f5f5f5; color: #999; font-size: 12px;">
            Sent from your portfolio contact form.
        </div>
    </div>
</body>
</html>