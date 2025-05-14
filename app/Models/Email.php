<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class Email
{
  protected PHPMailer $mail;
  protected array $from;
  protected array $to;
  protected string $message;


  public function setTo(array $to)
  {
    if (!array_key_exists('name', $to) || !array_key_exists('email', $to)) {
      throw new \Exception("O array deve conter os indices 'name' e 'email'.");
    }
    $this->to = $to;
  }

  public function setFrom(array $from)
  {
    if (!array_key_exists('name', $from) || !array_key_exists('email', $from)) {
      throw new \Exception("O array deve conter os indices 'name' e 'email'.");
    }
    $this->from = $from;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }


  protected function config()
  {
    $this->mail = new PHPMailer();
    require_once __DIR__ . '../../../src/Mail/config.php';
    // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $this->mail->isSMTP();                                            //Send using SMTP
    $this->mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
    $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $this->mail->Username   = EMAIL_USERNAME;                     //SMTP username
    $this->mail->Password   = EMAIL_PASSWORD;                               //SMTP password
    // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $this->mail->Port       = EMAIL_PORT;
    $this->mail->setLanguage('pt-br');
  }
  abstract public function send();
}
