<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $fillable = ['user_id', 'naziv'];
    protected $table = 'kategorija';

    public function podkategorije(){
        return $this->hasMany(podKategorija::class);
    }

    public function saveTicket($data){
            $this->user_id = auth()->user()->id;
            $this->naziv = $data['title'];
            $this->save();
            return 1;
    }

    public function updateTicket($data) {
            $ticket = $this->find($data['id']);
            $ticket->user_id = auth()->user()->id;
            $ticket->naziv = $data['title'];
            $ticket->save();
            return 1;
    }
}
