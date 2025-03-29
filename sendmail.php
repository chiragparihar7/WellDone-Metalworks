<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'metalworkswelldone@gmail.com'; 
    $mail->Password   = 'setz vqfk gajy lckh'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $date = htmlspecialchars($_POST["date"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $location = htmlspecialchars($_POST["location"]);
    $adminMessage = "
    <html>

<head>
    <title>New Quote Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }

        h2 {
            color: #0056b3;
        }

        p {
            margin: 0 0 40px 0;
        }

        strong {
            color: #333;
        }
        h1{
            margin:0px;
        }
            h1 span{
            text-transform:capitalize;
        }
    </style>
</head>

<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
    <div style='max-width: 600px; background: #ffffff; padding: 20px; border-radius: 40px; margin: auto;'>
        <h2 style='text-align: center; color: #333;'>New Quote Request</h2>
         <h1><span>$name</span>, requested for a quotation.</h1>
        <p style='padding-bottom:20px;margin-bottom:10px;'>Your order is being processed by UPS and is on its way to Amsterdam. You will receive an
                            update from us regarding the status of your order and the delivery of the parcel.</p>
        <table style='width: 100%; border-collapse: collapse;border-radius: 20px;overflow: hidden;'>
            <tbody style='background:rgb(232, 226, 226);'>
                  <tr>
                    <td style='padding: 20px 20px 5px; text-align: left; font-weight:bold; color: black;'><strong>Name:</strong> $name</td>
                </tr>
                
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Email:</strong> $email</td>
                </tr>
               
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Building Date:</strong> $date</td>
                </tr>
               
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Phone:</strong> $phone</td>
                </tr>
                
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Location:</strong> $location</td>
                </tr>
                
                <tr>
                    <td style='padding: 10px 20px 20px; text-align: left; font-weight:bold; color: black;'>
                    <p style='margin:0px;'>Best Regards,</p>
                    <p style='margin:0px;'>Welldone Metal Works
                    </p></td>
                </tr>
                
            </tbody> 
            
        </table>
        <p style='text-align: center; padding: 10px; margin:0px;'>For any inquiries, contact us at: <br>Email: $email | Phone:
            $phone</p>
    </div>

</body>

</html>";

    $mail->setFrom('metalworkswelldone@gmail.com', 'Welldone MetalWorks');
    $mail->addAddress('panchalsourav32@gmail.com', 'Sourav Panchal'); 
    $mail->isHTML(true);
    $mail->Subject = 'New Quote Request';
    $mail->Body    = $adminMessage;
    $mail->send();

    
    $mail->clearAddresses(); 
    $mail->addAddress($email, $name);

    $userMessage = "
    <html>
    <head>
        <title>Thank You for Your Request</title>
        <style>
        h1{
            color:#00000;
        }
            h1 span{
                text-transform:capitalize;
            }
                
        </style>
    </head>
    <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
     <div style='max-width: 600px; background: #ffffff; padding: 20px; border-radius: 40px; margin: auto;'>
        <h1> <span>$name!</span>,thank you for your order.</h1>
        <p style='padding-bottom:20px;margin-bottom:10px;'>We have received your quote request and will get back to you soon.</p>
        <table style='width: 100%; border-collapse: collapse;border-radius: 20px;overflow: hidden;'>
            <tbody style='background:rgb(232, 226, 226);'>
                  <tr>
                    <td style='padding: 20px 20px 5px; text-align: left; font-weight:bold; color: black;'><strong>Name:</strong> $name</td>
                </tr>
                
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Email:</strong> $email</td>
                </tr>
               
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Building Date:</strong> $date</td>
                </tr>
               
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Phone:</strong> $phone</td>
                </tr>
                
                <tr>
                    <td style='padding: 5px 20px; text-align: left; font-weight:bold; color: black;'><strong>Location:</strong> $location</td>
                </tr>
                
                <tr>
                    <td style='padding: 10px 20px 20px; text-align: left; font-weight:bold; color: black;'>
                    <p style='margin:0px;'>Best Regards,</p>
                    <p style='margin:0px;'>Welldone Metal Works
                    </p></td>
                </tr>
                
            </tbody> 
            
        </table>
        
        </div>
    </body>
    </html>";

    $mail->Subject = 'Thank You for Your Quote Request';
    $mail->Body    = $userMessage;
    $mail->send();

    echo "success";
} catch (Exception $e) {
    echo "error";
}