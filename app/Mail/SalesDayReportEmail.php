<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalesDayReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $day_report_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->day_report_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'jft@email.com';
        $subject = 'Sales Day Reporing';
        $name = 'Manager';

        return $this->view('emails.day_report')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    //->with($this->day_report_data);
                    ->attachData();
    }
}
