<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $capitan;
    public $team;
    public $members;
    public $event;

    public function __construct($capitan, $team, $event)
    {
        $this->capitan = $capitan;
        $this->team = $team;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/user/events/all');
        $text = 'От '.$this->event->from.' до '.$this->event->to.' ще се проведе<br/>
        <b>'.$this->event->name.'</b><br/>
        <p>
        Здравейте, имате покана за влизане в отбор : '.$this->team->title.'
        <img src="'.asset('/images/events/teams/'.$this->team->picture).'" alt="team-logo"><br/>
        <center><i>поканата е изпратена от капитана : '.$this->capitan->name.' '.$this->capitan->last_name.'</i></center>
        </p>
        '.$this->event->description.'
        <p>'.
        $this->event->rules
        .'</p>';
        return $this->from($this->capitan->email)
                ->markdown('events.mails.invite_member', compact('url', 'text'));
    }
}
