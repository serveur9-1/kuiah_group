<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class enableOrDisableProject extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template_loaded = $this->event->is_fr? 'emails.projects.enableOrDisableProject_fr': 'emails.projects.enableOrDisableProject_en';

        return $this->subject($this->event->is_fr? 'Votre annonce sur KUIAH Finance': 'Your ad on KUIAH Finance)')
            ->to($this->event->email)
            ->markdown($template_loaded)->with([
                '_name' => $this->event->name
            ]);
    }
}
