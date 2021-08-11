<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index(Request $req)
    {
        $key = trim($req->q);
        if($key){            
            $pengumumans = Pengumuman::where('content','LIKE',"%$key%")->orderBy('content', 'ASC')->paginate();
        }else{            
            $pengumumans = Pengumuman::orderBy('content', 'ASC')->paginate(10);
        }        
        $user = Auth::user();
        return view('pengumuman.index', compact(['pengumumans','user']));
    }
    public function guest(Request $req)
    {
        $key = trim($req->q);
        if($key){            
            $pengumumans = Pengumuman::where('content','LIKE',"%$key%")->orderBy('content', 'ASC')->paginate();
        }else{            
            $pengumumans = Pengumuman::orderBy('content', 'ASC')->paginate(10);
        }        
        $user = Auth::user();
        return view('pengumuman.index', compact(['pengumumans','user']));
    }
    public function create()
    {
        $user = Auth::user();
        return view('pengumuman.create',compact('user'));
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
    public function edit(Pengumuman $pengumuman)
    {                
        $user = Auth::user();
        return view('pengumuman.edit', compact(['pengumuman','user']));
    }
    public function update(Request $req, Pengumuman $pengumuman)
    {
        $this->validate($req, [
            'content' => 'required'
        ]);        
        $pengumuman = Pengumuman::findOrFail($pengumuman->id);        
        if($req->file('file_upload') == "")
        {
            $pengumuman->update([
                'content' => $req->content
            ]);
        }
        else
        {
            Storage::disk('local')->delete('public/pengumumans/'.$pengumuman->file_upload);
            $file_upload = $req->file('file_upload');
            $file_upload->storeAs('public/pengumumans', $file_upload->hashName());

            $pengumuman->update([
                'content' => $req->content,
                'file_upload' => $file_upload->hashname()
            ]);            
        }
        if(!$pengumuman){
            return redirect()->route('pengumuman.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil disunting!!']);
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
    public function download($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $file = public_path().'/storage/pengumumans/'.$pengumuman->file_upload;        
        return response()->download($file);
    }
}
