<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class waitAccountValidate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template_loaded = $this->event->is_fr? 'emails.waitAccountValidate.waitAccountValidate_fr': 'emails.waitAccountValidate.waitAccountValidate_en';

        return $this->subject($this->event->is_fr? 'Votre compte est en attente de validation': 'Your account is pending validation')
            ->to($this->event->email)
            ->markdown($template_loaded)->with([
                '_firstname' => $this->event->firstname
            ]);
    }
}
