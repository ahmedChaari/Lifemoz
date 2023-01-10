<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use resource\views\emails\welcomeMessageMail;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting('Hello, '.$this->user->name)
                ->line('Welcome to Codelapan.')
                ->action('Explore', url('/'))
                ->line('Thank you for using our application!')
                ->attach('promotion.PNG');
    }
}
