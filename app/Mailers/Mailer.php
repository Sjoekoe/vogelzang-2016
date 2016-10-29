<?php
namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer as Mail;
use Illuminate\Mail\Message;

abstract class Mailer
{
    /**
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    protected $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param string $mail
     * @param string $subject
     * @param string $view
     * @param array $data
     * @param string $replyTo
     */
    public function sendTo($mail, $subject, $view, $data = [], $replyTo = '')
    {
        $this->mail->send($view, $data, function(Message $message) use ($mail, $subject, $replyTo) {
            $message->to($mail)->subject($subject)
                ->replyTo($replyTo);
        });
    }
}
