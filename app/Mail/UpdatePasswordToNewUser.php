<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdatePasswordToNewUser extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public $passworDefault;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $passworDefault)
    {
        $this->user = $user;
        $this->passworDefault = $passworDefault;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Has sido registrado en nuestro sistema -' . config("app.name"))
            ->markdown("emails.new_users");
    }
}
