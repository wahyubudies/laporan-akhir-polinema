<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\RefrensiTema;
use Illuminate\Http\Request;

class RefrensiTemaController extends Controller
{
    public function index()
    {
        // $refrensiTema = RefrensiTema::join('dosens','dosen_id','=','dosens.id')->get(['refrensi_temas.tema','dosens.nama_dosen']);
        $dosens = Dosen::all();
        return view('refrensi-tema.index', compact('dosens'));        
    }
    public function create()
    {
        $dosens = Dosen::get(['id','nama_dosen']);
        return view('refrensi-tema.create', compact('dosens'));
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
