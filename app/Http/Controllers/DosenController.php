<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->get();
        return view('dosen.index', compact('dosens'));
    }
    public function create()
    {
        return view('dosen.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'nama_dosen' => 'required'
        ]);        
        $dosen = Dosen::create([
            'nama_dosen' => $req->nama_dosen
        ]);
        if(!$dosen)
        {
            return redirect()->route('dosen.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('dosen.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function edit(Dosen $dosen)
    {        
        return view('dosen.edit', compact('dosen'));
    }
    public function update(Request $req, Dosen $dosen)
    {
        $this->validate($req, [
            'nama_dosen' => 'required'
        ]);        
        $dosen = Dosen::findOrFail($dosen->id);        
        if($dosen)
        {
            $dosen->update([
                'nama_dosen' => $req->nama_dosen                
            ]);            
        }
        if(!$dosen){
            return redirect()->route('dosen.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('dosen.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);        
        $dosen->delete();
        if(!$dosen)
        {
            return redirect()->route('dosen.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('dosen.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
