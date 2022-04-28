<?php

namespace App\Controller;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer){
        $this->mailer = $mailer;
    }

    public function index($to,$content): void
    {

        $email= (new Email())
            ->from('yourtrip226@gmail.com')
            ->to($to)
            ->subject('YourTrip')
            ->text($content);

        $this->mailer->send($email);
    }
}