<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\podKategorija;
use App\Kategorija;

class podKategorijaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $podKategorije = podKategorija::with('kategorija')->get();
        return view('podKategorija.index',compact('podKategorije'));
    }

    public function create()
    {
        $kategorije = Kategorija::all();
        return view('podKategorija.create',compact('kategorije'));
    }

    public function store(Request $request)
    {
        $ticket = new podKategorija();
        $data = $this->validate($request, [
            'title'=> 'required',
            'kategorija_id' => 'required',
        ]);

        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $data['slikaUrl'] = 'images/'.$new_name;
        $ticket->saveTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $podKategorija = podKategorija::where('id', $id)
        ->first();
        $kategorije = Kategorija::all();
        return view('podKategorija.edit', compact('podKategorija', 'kategorije' , 'id'));
    }

    public function update(Request $request, $id)
    {
        $ticket = new podKategorija();
        $data = $this->validate($request, [
            'title'=> 'required',
            'kategorija_id' => 'required',
        ]);
        $data['id'] = $id;
        $image = $request->file('select_file');

        if($image != null) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $data['slikaUrl'] = 'images/'.$new_name;
        }

        $ticket->updateTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }

    public function destroy($id)
    {
        $ticket = podKategorija::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }

}
