<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StockNot extends Notification
{
    use Queueable;
    public $produit;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($produit,$user)
    {
        $this->produit= $produit;
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase()
    {
        return [
            'msg'=> 'a Ajouté Nouveau Produit Dans ',
            'produitstock_id'=>$this->produit->id,
            'user_name'=> $this->user->name,
            'user_id'=>$this->user->id,
            'magasin'=> $this->user->magasin->nom_magasin,
        ];
    }
    public function toArray($notifiable)
    {
        return [

        ];

    }
}
