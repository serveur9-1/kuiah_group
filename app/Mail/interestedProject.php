<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class interestedProject extends Mailable
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
        $template_loaded = $this->event->is_fr? 'emails.interestedProject.interestedProject_fr': 'emails.interestedProject.interestedProject_en';

        return $this->subject($this->event->is_fr? 'Personne interessé par votre annonce': 'Person interested in your ad')
            ->to($this->event->email)
            ->markdown($template_loaded)->with([
                '_name' => $this->event->firstname,
            ]);
    }
}
