<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class SendPDFMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf)
    {
        $this->pdf= $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
               ->subject('Admit Card')
               ->view('mail.pdfMail')
               ->attachData($this->pdf->output(), 'admitcard.pdf',[
                'mime'=>'application/pdf',
               ]);

      //  return $this->view('view.name');
    }
}