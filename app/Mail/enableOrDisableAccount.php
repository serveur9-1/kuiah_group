<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class enableOrDisableAccount extends Mailable
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
        $template_loaded = $this->event->is_fr? 'emails.enableOrDisableAccount.enableOrDisableAccount_fr': 'emails.enableOrDisableAccount.enableOrDisableAccount_en';

        return $this->subject($this->event->is_fr? 'Votre compte sur KUIAH Finance': 'Your account on KUIAH Finance')
            ->to($this->event->email)
            ->markdown($template_loaded)->with([
                '_name' => $this->event->firstname,
                'is_first_activation' => $this->event->is_first_activation,
                'is_actived' => $this->event->is_actived,
            ]);
    }
}
