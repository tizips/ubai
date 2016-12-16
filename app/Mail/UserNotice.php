<?php

namespace App\Mail;

use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotice extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $order)
    {
        $this -> order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this -> from('tizips@163.com' , 'tizips')
            -> subject('测试邮件')
            ->view('emails.userNotice')
            ->with([
                'name'  =>  $this -> order -> name,
                'thumb' =>  $this -> order -> thumb,
                'web_url'   =>  config('site.web_url'),
            ]);
    }
}
