<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorija;

class KategorijaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $kategorije = Kategorija::all();
        return view('kategorija.index',compact('kategorije'));
    }

    public function create()
    {
        return view('kategorija.create');
    }

    public function store(Request $request)
    {
        $ticket = new Kategorija();
        $data = $this->validate($request, [
            'title'=> 'required'
        ]);
       
        $ticket->saveTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $kategorija = Kategorija::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('kategorija.edit', compact('kategorija', 'id'));
    }

    public function update(Request $request, $id)
    {
        $ticket = new Kategorija();
        $data = $this->validate($request, [
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }

    public function destroy($id)
    {
        $ticket = Kategorija::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }

}
