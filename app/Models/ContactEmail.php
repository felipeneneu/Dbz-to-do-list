<?php

namespace App\Models;

use PHPMailer\PHPMailer\Exception;

class ContactEmail extends Email
{

  /** @test */
  public function send()
  {
    $this->config();
    $this->mail->setFrom($this->from['email'], $this->from['name']);
    $this->mail->addAddress($this->to['email'], $this->to['name']);
    $this->mail->Body = $this->message;

    //Content
    $this->mail->isHTML(true);                                  //Set ethis format to HTML
    $this->mail->Subject = 'Recupere sua conta';
    // $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $this->mail->AltBody = 'This is the body in plain text for non-HTML this clients';

    $send = $this->mail->send();
    if (!$send) {
      throw new Exception($this->mail->ErrorInfo);
    }
    echo "Email enviado com sucesso!";
  }
}
