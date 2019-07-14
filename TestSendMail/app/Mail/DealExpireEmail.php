<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Deal;

class DealExpireEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $deal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Deal $deal)
    {
        //
        $this->deal = $deal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'tippzi@gmail.com';
        $subject = 'Your deal is expired';
        $name = 'Tippzi Admin';
        
        return $this->view('emails.deal_expire')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);
    }
}
