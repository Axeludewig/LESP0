<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

require '../vendor/autoload.php';

class EmailController extends Controller
{
    public function sendmail(){

    Mail::to(auth()->user()->email)->send(new Email('a'));
        //
    }

    public function emailme(Request $request)
    {
        $formFields = $request->validate([
            'nombre' => 'required',
            'fecha_de_terminacion' => 'required',
            'nombre_user' => 'required',
            'valor_curricular' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required'
        ]);

        $path = base_path('FIRMAS.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $path2 = base_path('gob.jpg');
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $pic2 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

        $path3 = base_path('SS1.png');
        $type3 = pathinfo($path3, PATHINFO_EXTENSION);
        $data3 = file_get_contents($path3);
        $pic3 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3);

        $query = 'q=' . $formFields['apellido_paterno'] . '+' . $formFields['apellido_materno'] . '&status=Verificado&curso=' . $formFields['nombre'];
        $qrCodeContent = 'https://0e8c-2806-103e-5-9c10-497f-6006-5241-43c7.ngrok.io/validaciones/search?' . $query;

        $valor_curricular = $formFields['valor_curricular'];
        $nombre_usuario = $formFields['nombre_user'] . " " . $formFields['apellido_paterno'] . " " . $formFields['apellido_materno'];
        $nombre_del_curso = $formFields['nombre'];
        $user_id = auth()->user()->rfc;
        $tipo = DB::table('participantes')
        ->where('rfc_participante', $user_id)
        ->where('nombre_curso', $nombre_del_curso)
        ->value('tipo');

        $folio = DB::table('validaciones')
        ->where('nombre_curso', '=', $nombre_del_curso)
        ->where('nombre_usuario', '=', $nombre_usuario)
        ->value('folio');

        $qrcode = (new QRCode())->render($qrCodeContent);

        // Create a new instance of dompdf
        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('pdf', compact(['formFields', 'pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'tipo', 'folio'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'vertical');

        // Render the PDF
        $pdf->render();

        $pdfContent = $pdf->output();

        $filename = $formFields['nombre'] . '.pdf';
        $data = [
            'title' => 'Demo Email',
            'body' => 'This is a demo email from Laravel.',
        ];

        $pdfFilename = uniqid() . '.pdf';
        //$pdfPath = 'temp/' . $pdfFilename;
        $pdfPath = 'temp' . DIRECTORY_SEPARATOR . $pdfFilename;
        
        Storage::put($pdfPath, $pdfContent);

        if (Storage::exists($pdfPath)) {
            echo "PDF file was successfully stored in storage/app/{$pdfPath}";
        } else {
            echo "Failed to store PDF file in storage/app/{$pdfPath}";
        }


        //Mail::to('axelramirezludewig@gmail.com')->send(new Email($data), function($message) use ($pdfPath, $pdfFilename) {
        //    $message->attach(storage_path('app/' . $pdfPath), [
        //        'as' => $pdfFilename,
        //        'mime' => 'application/pdf',
        //    ]);
        //});

        //$file = storage_path('app' . DIRECTORY_SEPARATOR . $pdfPath);
        $file = storage_path($pdfPath);
        //$file = Storage::get($pdfPath);
        
        


        echo '...' . 'PATH AL ARCHIVO: ' .$file;

        //$absolute_path = storage_path('app/'.$pdfPath);
        
        Mail::to('axelramirezludewig@gmail.com')->send(new Email($data), function($message) use ($file, $pdfFilename) {
            $message->attach($file, [
                'as' => $pdfFilename,
                'mime' => 'application/pdf',
            ]);
        });


        
        // Delete the temporary file
        Storage::delete($pdfPath);

        return '...Demo email sent';
        }

    public function mailme(){
        
//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'username@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'yourpassword';

//Set who the message is to be sent from
//Note that with gmail you can only use your account address (same as `Username`)
//or predefined aliases that you have configured within your account.
//Do not use user-submitted addresses in here
$mail->setFrom('from@example.com', 'First Last');

//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('whoto@example.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
    }

}