<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::latest()->get();
        return view('pengumuman.index', compact('pengumumans'));
    }
    public function create()
    {
        return view('pengumuman.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'content' => 'required',
            'file_upload' => 'required|mimes:pdf,xlx,csv,docs,doc|max:2048'
        ]);
        $file_upload = $req->file('file_upload');
        $file_upload->storeAs('public/pengumumans', $file_upload->hashName());
        $pengumuman = Pengumuman::create([
            'content' => $req->content,
            'file_upload' => $file_upload->hashName()
        ]);
        if(!$pengumuman)
        {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        Storage::disk('local')->delete('public/pengumumans/'.$pengumuman->file_upload);
        $pengumuman->delete();
        
        if(!$pengumuman)
        {
            return redirect()->route('pengumuman.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('pengumuman.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
