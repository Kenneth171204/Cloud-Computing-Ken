<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address; 

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData; 

    public function __construct(array $mailData) 
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
    return new Envelope(
        subject: $this->mailData['subject'] ?? 'Cloud Computing 2025 - Confirmation',

        // UBAH INI:
        from: new Address("kenneth@kenneth.vexel.my.id", "Cloud Computing 2025"), 
    );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.registration-confirm',
            with: [
                // Mengubah array $mailData menjadi objek standar $registration yang DIBUTUHKAN TEMPLATE
                // Perhatian: Hanya key yang digunakan di template (full_name, student_email, birthdate) yang disertakan.
                'registration' => (object) [
                    'full_name' => $this->mailData['name'] ?? null,
                    'student_email' => $this->mailData['email'] ?? null,
                    'birthdate' => $this->mailData['birth_date'] ?? null,
                ],
                // Data tambahan yang mungkin digunakan di tempat lain:
                'password' => $this->mailData['password'] ?? null,
                'confirm_password' => $this->mailData['confirm_password'] ?? null,
                'subject' => $this->mailData['subject'] ?? null,
                'userMessage' => $this->mailData['message'] ?? null,
                'mailData' => $this->mailData,
            ]
        );
    }
}
