<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Capsule;

class CapsuleRevealedMail extends Mailable
{
    use SerializesModels;

    protected $capsule;

    public function __construct(Capsule $capsule)
    {
        $this->capsule = $capsule;
    }

    public function build()
    {
        $text = "🎉 Capsule Revealed!\n\n"
            . "Title: {$this->capsule->title}\n"
            . "Message: {$this->capsule->message}\n"
            . "Privacy: {$this->capsule->privacy}\n"
            . "Country: {$this->capsule->country}\n"
            . "Tags: {$this->capsule->tag}\n"
            . "Revealed At: " . now()->toDateTimeString() . "\n\n"
            . "View it on the TimeCapsule App.";

        return $this->subject('Your Capsule Has Been Revealed')
            ->text('emails.raw-capsule-text') // We'll define this next as a plain file
            ->with(['text' => $text]);
    }
}
