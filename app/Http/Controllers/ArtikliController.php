<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikli;
use App\podKategorija;

class ArtikliController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $artikli = Artikli::with('podkategorija')->get();
        return view('artikli.index',compact('artikli'));
    }

    public function create()
    {
        $podKategorije = podKategorija::all();
        return view('artikli.create',compact('podKategorije'));
    }

    public function store(Request $request)
    {
        $ticket = new Artikli();
        $data = $this->validate($request, [
            'title'=> 'required',
            'desc'=> 'required',
            'podkategorija_id' => 'required'
        ]);
       
        $ticket->saveTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $artikal = Artikli::where('id', $id)->first();
        $podKategorije = podKategorija::all();
        return view('artikli.edit', compact('podKategorije','artikal', 'id'));
    }

    public function update(Request $request, $id)
    {
        $ticket = new Artikli();
        $data = $this->validate($request, [
            'title'=> 'required',
            'desc'=> 'required',
            'podkategorija_id' => 'required'
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }

    public function destroy($id)
    {
        $ticket = Artikli::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }

}
