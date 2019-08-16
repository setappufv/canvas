<?php

namespace Canvas\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Digest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Weekly stats data for a user.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->to($this->data['email'])
            ->subject(sprintf('%s: %s - %s', __('canvas::mail.digest.email.subject'), $this->data['start_date'], $this->data['end_date']))
            ->view('canvas::emails.digest');
    }
}
