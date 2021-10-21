<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreateMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $textUsername;
    public $textEmail;
    public $textRoles;
    public $textPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $email, $roles, $password)
    {
        $this->textUsername = $username;
        $this->textEmail = $email;
        $this->textRoles = $roles;
        $this->textPassword =$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
        ->subject("Nueva cuenta")
        ->Markdown("emails.new-user");
    }
}
