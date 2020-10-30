<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class greetingMail extends Mailable
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
        $template_loaded = $this->event->is_fr? 'emails.teamMail.greetingMail_fr': 'emails.teamMail.greetingMail_en';

        return $this->subject($this->event->is_fr? 'Les fondateurs vous saluent...': 'The founders greet you...')
            ->to($this->event->email)
            ->markdown($template_loaded)->with([
                '_name' => $this->event->name,
                '_id' => $this->event->id
            ]);
    }
}

