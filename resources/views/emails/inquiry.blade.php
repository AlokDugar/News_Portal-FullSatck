@php
    use App\Models\Setting;
    $settings = Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $settings->website_name }}</title>
    <meta charset="UTF-8">
</head>
<body style="margin: 0; padding: 0; background-color: #edf2f7; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #edf2f7; padding: 40px 0;">
        <tr>
            <td align="center" style="font-size: 22px; font-weight: bold; color: #2d3748; padding-bottom: 20px;">
                {{ strtoupper($settings->website_name) }}
            </td>
        </tr>
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; padding: 30px;">
                    <tr>
                        <td style="color: #2d3748; font-size: 16px; font-weight: bold; padding-bottom: 10px;">
                            New Contact Inquiry
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; color: #4a5568; padding-bottom: 6px;">
                            <strong>Name:</strong> {{ $details['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; color: #4a5568; padding-bottom: 6px;">
                            <strong>Email:</strong> <a href="mailto:{{ $details['email'] }}" style="color: #2b6cb0;">{{ $details['email'] }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; color: #4a5568; padding-bottom: 6px;">
                            <strong>Subject:</strong> {{ $details['subject'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; color: #4a5568;">
                            <strong>Message:</strong><br>
                            {{ $details['message'] }}
                        </td>
                    </tr>
                </table>

                <table width="600" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
                    <tr>
                        <td align="center" style="font-size: 13px; color: #a0aec0;">
                            © {{ now()->year }} {{ $settings->website_name }}. All rights reserved.
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 13px; color: #a0aec0;">
                            Powered By {{ $settings->website_name }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
