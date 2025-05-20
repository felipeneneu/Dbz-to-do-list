<?php

use PHPMailer\PHPMailer\PHPMailer;
use App\Config;

class PHPMailerAdapter implements MailerInterface
{
  protected PHPMailer $mailer;
  protected string $host;

  /** 
   * @test
   * @testdox  description
   */
  public function __construct()
  {
    $config = new Config(__DIR__ . '/../../app/Config');
    $config = $config->get('mail');

    $this->mailer = new PHPMailer(true);

    $this->mailer->isSMTP();
    $this->mailer->Host = $config['host'] ?? 'stmp.exemple.com';
    $this->mailer->SMTPAuth = true;
    $this->mailer->Username = $config['username'] ?? '';
    $this->mailer->Password = $config['password'] ?? '';
    $this->mailer->SMTPSecure = $config['encryption'] ?? PHPMailer::ENCRYPTION_STARTTLS;
    $this->mailer->Port = $config['port'] ?? 587;
  }
}
