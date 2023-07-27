<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FileAttachmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;
    public $fileName;

    /**
     * Create a new message instance.
     *
     * @param  string  $pdfContent
     * @param  string  $fileName
     * @return void
     */
    public function __construct(string $pdfContent, string $fileName)
    {
        $this->pdfContent = $pdfContent;
        $this->fileName = $fileName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Solicitud de Usuarios')
        ->view('mails.file_attachment') // Ajusta el nombre de la vista aquí
        ->attachData($this->pdfContent, $this->fileName, ['mime' => 'application/pdf']);
    }
}
