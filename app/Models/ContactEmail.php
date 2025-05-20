<?php

namespace App\Models;

use PHPMailer\PHPMailer\Exception;
use App\Config\Session;

class ContactEmail extends Email
{


  public function send()
  {
    $this->config();
    $this->mail->setFrom($this->from['email'], $this->from['name']);
    $this->mail->addAddress($this->to['email'], $this->to['name']);
    $this->mail->Body = $this->message;

    //Content
    $this->mail->isHTML(true);
    $this->mail->CharSet = 'UTF-8';                                //Set ethis format to HTML
    $this->mail->Subject = $this->subject;
    // $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $this->mail->AltBody = 'This is the body in plain text for non-HTML this clients';

    $send = $this->mail->send();
    if (!$send) {
      throw new Exception($this->mail->ErrorInfo);
    }
    $session = new Session();
    $session->set('success', 'Email enviado com sucesso!');
    header("Location: /forgot-password");
  }
}