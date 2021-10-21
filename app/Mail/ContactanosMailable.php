<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Markdown;
use Illuminate\Queue\SerializesModels;


class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public  $textName;
    public  $textEmail;
    public  $textSubject;
    public  $textMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name,  $email,  $subject,  $message)
    {

       $this->textName = $name;
       $this->textEmail = $email;
       $this->textSubject = $subject;
       $this->textMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Formulario de contacto-" . config("app.name"))
        ->Markdown("emails.contactanos");
    }
}
