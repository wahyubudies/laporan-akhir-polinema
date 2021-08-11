<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\RefrensiTema;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefrensiTemaController extends Controller
{    
    public function index(Request $req)
    {                
        $key = trim($req->q);
        if($key){            
            $dosens = Dosen::where('nama_dosen', 'LIKE', "%$key%")->orderBy('nama_dosen', 'ASC')->paginate();
        }else{
            $dosens = Dosen::orderBy('nama_dosen', 'ASC')->paginate(10);
        }
        $user = Auth::user();        
        return view('refrensi-tema.index', compact(['dosens','user']));           
    }
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('refrensi-tema.show', ['dosen' => $dosen]);
    }
    public function guest(Request $req)
    {                
        $key = trim($req->q);
        if($key){            
            $dosens = Dosen::where('nama_dosen', 'LIKE', "%$key%")->orderBy('nama_dosen', 'ASC')->paginate();            
        }else{
            $dosens = Dosen::orderBy('nama_dosen', 'ASC')->paginate(10);
        }
        $user = Auth::user();        
        return view('refrensi-tema.index', compact(['dosens','user']));           
    }
    public function search(Request $req)
    {
        $from = Carbon::parse($req->from)
        ->startOfDay()
        ->toDateTimeString();
        $to = Carbon::parse($req->to)        
        ->endOfDay()
        ->toDateTimeString();
        $data = RefrensiTema::whereBetween('created_at', [$from,$to])->get();        
        return $data;
    }
    public function create()
    {
        $user = Auth::user();
        $dosens = Dosen::get(['id','nama_dosen']);
        return view('refrensi-tema.create', compact(['dosens','user']));
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'tema' => 'required',
            'dosen_id' => 'required'
        ]);
        // dd($req->dosen_id);
        $refrensiTema = RefrensiTema::create([
            'tema' => $req->tema,
            'dosen_id' => $req->dosen_id
        ]);        
        if(!$refrensiTema)
        {
            return redirect()->route('refrensi-tema.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('refrensi-tema.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function edit(RefrensiTema  $refrensiTema)
    {        
        $user = Auth::user();
        return view('refrensi-tema.edit', compact(['refrensiTema','user']));
    }
    public function update(Request $req, RefrensiTema $refrensiTema)
    {
        $this->validate($req, [
            'tema' => 'required'
        ]);        
        $refrensiTema = RefrensiTema::findOrFail($refrensiTema->id);        
        if($refrensiTema)
        {
            $refrensiTema->update([
                'tema' => $req->tema                
            ]);            
        }
        if(!$refrensiTema){
            return redirect()->route('refrensi-tema.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('refrensi-tema.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $refrensiTema = RefrensiTema::findOrFail($id);
        $refrensiTema->delete();
        if(!$refrensiTema)
        {
            return redirect()->route('refrensi-tema.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('refrensi-tema.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
