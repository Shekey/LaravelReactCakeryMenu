<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikli extends Model
{
    protected $table = 'artikli';

    public function podkategorija(){
        return $this->belongsTo(podKategorija::class);
    }

    public function saveTicket($data){
        $this->user_id = auth()->user()->id;
        $this->naziv = $data['title'];
        $this->opis = $data['desc'];
        $this->podkategorija_id = $data['podkategorija_id'];
        $this->save();
        return 1;
}

public function updateTicket($data) {
        $ticket = $this->find($data['id']);
        $ticket->user_id = auth()->user()->id;
        $ticket->naziv = $data['title'];
        $ticket->opis = $data['desc'];
        $ticket->podkategorija_id = $data['podkategorija_id'];
        $ticket->save();
        return 1;
}
    
}
