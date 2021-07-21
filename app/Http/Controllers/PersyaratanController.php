<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersyaratanController extends Controller
{   
    public function index(Request $req)
    {
        $key = trim($req->q);
        if($key){            
            $persyaratans = Persyaratan::where('content', 'LIKE', "%$key%")->paginate();
        }else{            
            $persyaratans = Persyaratan::latest()->paginate(10);
        }        
        $user = Auth::user();
        return view('persyaratan.index', compact(['persyaratans', 'user']));
    }    
    public function guest(Request $req)
    {
        $key = trim($req->q);
        if($key){            
            $persyaratans = Persyaratan::where('content', 'LIKE', "%$key%")->paginate();
        }else{            
            $persyaratans = Persyaratan::latest()->paginate(10);
        }        
        $user = Auth::user();
        return view('persyaratan.index', compact(['persyaratans', 'user']));
    }  
    public function create()
    {
        $user = Auth::user();
        return view('persyaratan.create', compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'content' => 'required'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/persyaratans', $image->hashName());
        $persyaratan = Persyaratan::create([
            'image' => $image->hashName(),
            'content' => $request->content
        ]);
        if(!$persyaratan){
            return redirect()->route('persyaratan.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('persyaratan.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }        
    public function edit(Persyaratan $persyaratan)
    {
        $user = Auth::user();
        return view('persyaratan.edit', compact(['persyaratan', 'user']));
    }
    public function update(Request $request, Persyaratan $persyaratan)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);
        $persyaratan = Persyaratan::findOrFail($persyaratan->id);
        if($request->file('image') == ""){
            $persyaratan->update([
                'content' => $request->content
            ]);
        }else{
            //remove local image
            Storage::disk('local')->delete('public/persyaratans/'.$persyaratan->image);
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/persyaratans/', $image->hashName());

            $persyaratan->update([
                'content' => $request->content,
                'image' => $image->hashName()
            ]);            
        }

        if(!$persyaratan){
            return redirect()->route('persyaratan.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('persyaratan.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);
        Storage::disk('local')->delete('public/persyaratans/'.$persyaratan->image);
        $persyaratan->delete();

        if(!$persyaratan){
            return redirect()->route('persyaratan.index')->with(['danger' => 'Data gagal dihapus!!']);
        }else{
            return redirect()->route('persyaratan.index')->with(['success' => 'Data berhasil dihapus!!']);
        }       
    }
}