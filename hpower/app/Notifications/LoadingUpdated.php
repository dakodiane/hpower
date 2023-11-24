<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Loading;

class LoadingUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $loading;

    public function __construct(Loading $loading)
    {
        $this->loading = $loading;
    }
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Modification du Loading ' . $this->loading->id_loading)
            ->markdown('vendor.notifications.loading_updated', ['loading' => $this->loading]);
    }
}
