<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class podKategorija extends Model
{
    protected $table = 'podkategorija';
    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }

    public function artikli(){
        return $this->hasMany(Artikli::class);
    }

    public function saveTicket($data){
        $this->naziv = $data['title'];
        $this->kategorija_id = $data['kategorija_id'];
        $this->slikaUrl = $data['slikaUrl'];
        $this->save();
        return 1;
    }

    public function updateTicket($data) {
        $ticket = $this->find($data['id']);
        $ticket->naziv = $data['title'];
        $ticket->kategorija_id = $data['kategorija_id'];
        $ticket->slikaUrl = $data['slikaUrl'];
        $ticket->save();
        return 1;
}
}
