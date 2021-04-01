<?php

namespace App\Notifications;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAdded extends Notification
{
    use Queueable;
    public $taskadded;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($taskadded)
    {
        $this->task = $taskadded;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function toDatabase($notifiable)
   {
       return [
           'Due_Date' => $this->task->Due_Date,
           'Description' => $this->task->Description,
           'Added_By' => $this->Task->Added_By
       ];
   }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
