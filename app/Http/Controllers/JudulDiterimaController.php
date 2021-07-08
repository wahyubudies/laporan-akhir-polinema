<?php

namespace App\Http\Controllers;

use App\Models\JudulDiterima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JudulDiterimaController extends Controller
{
    public function index(Request $req)
    {
        $key = trim($req->q);
        if($key){
            $judul_diterimas = JudulDiterima::where('judul', 'LIKE', "%$key%")->paginate();
        }else{
            $judul_diterimas = JudulDiterima::latest()->paginate(10);
        }        
        $user = Auth::user();
        return view('judul-diterima.index', [
            'judul_diterimas' => $judul_diterimas,
            'user' => $user
        ]);
    }
    public function guest(Request $req)
    {
        $key = trim($req->q);
        if($key){
            $judul_diterimas = JudulDiterima::where('judul', 'LIKE', "%$key%")->paginate();
        }else{
            $judul_diterimas = JudulDiterima::latest()->paginate(10);
        }        
      $user = Auth::user();
      return view('judul-diterima.index', [
        'judul_diterimas' => $judul_diterimas,
        'user' => $user
      ]);
    }
    public function create()
    {
        $user = Auth::user();
        return view('judul-diterima.create', compact('user'));
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'judul' => 'required',
        ]);        
        $judul_diterima = JudulDiterima::create([
            'nama' => $req->nama,
            'nim' => $req->nim,
            'kelas' => $req->kelas,
            'judul' => $req->judul,
        ]);
        if(!$judul_diterima)
        {
            return redirect()->route('judul-diterima.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('judul-diterima.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function edit(JudulDiterima $judul_diterima)
    {        
        $user = Auth::user();
        return view('judul-diterima.edit', compact(['judul_diterima','user']));
    }
    public function update(Request $req, JudulDiterima $judul_diterima)
    {
        $this->validate($req, [
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'judul' => 'required',
        ]);        
        $judul_diterima = JudulDiterima::findOrFail($judul_diterima->id);        
        if($judul_diterima)
        {
            $judul_diterima->update([
                'nama' => $req->nama,
            'nim' => $req->nim,
            'kelas' => $req->kelas,
            'judul' => $req->judul
            ]);            
        }
        if(!$judul_diterima){
            return redirect()->route('judul-diterima.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('judul-diterima.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $judul_diterima = JudulDiterima::findOrFail($id);        
        $judul_diterima->delete();
        if(!$judul_diterima)
        {
            return redirect()->route('judul-diterima.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('judul-diterima.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
