<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUserMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $textUsername;
    public $textPassword;
    public $textEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $password, $email)
    {
        $this->textUsername = $username;
        $this->textPassword =$password;
        $this->textEmail =$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Cuenta registrada de manera correcta")
        ->Markdown("emails.register-user");
    }
}
