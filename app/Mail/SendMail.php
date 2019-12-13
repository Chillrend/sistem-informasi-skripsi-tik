<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $proposal;
    public $sender;
    public $receiver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($proposal)
    {
        $this->proposal = $proposal;

        $this->sender = User::where('identifier', $proposal->mahasiswa)->first();
        $this->receiver = User::where('identifier', $proposal->pembimbing)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Anda telah dipilih menjadi pembimbing')
            ->view('layouts.email.email');
    }
}
