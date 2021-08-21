<?php

namespace App\Http\Controllers;

use App\Models\RekapJudul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RekapJudulController extends Controller
{
    public function index(Request $req)
    {
        $rekap_juduls = RekapJudul::latest()->paginate(10);
        $user = Auth::user();
        return view('rekap-judul.index', compact(['rekap_juduls','user']));
    }
    public function guest()
    {
        $rekap_juduls = RekapJudul::latest()->paginate(10);
        $user = Auth::user();
        return view('rekap-judul.index', compact(['rekap_juduls','user']));
    }
    public function create()
    {
        $user = Auth::user();
        return view('rekap-judul.create',compact('user'));
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'rekap_judul' => 'required|mimes:pdf|max:2048'
        ]);
        $rekap_judul = $req->file('rekap_judul');
        $rekap_judul->storeAs('public/rekap_juduls', $rekap_judul->hashName());
        $rekap_judul = RekapJudul::create([
            'rekap_judul' => $rekap_judul->hashName()
        ]);
        if(!$rekap_judul)
        {
            return redirect()->route('rekap-judul.index')->with(['error' => 'Data gagal disimpan!!']);
        }else{
            return redirect()->route('rekap-judul.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function detail($id)
    {
        $user = Auth::user();
        $rekap_judul = RekapJudul::findOrFail($id);
        return view('rekap-judul.detail', compact(['rekap_judul','user']));
    }
    public function edit(RekapJudul $rekap_judul)
    {
        $user = Auth::user();
        return view('rekap-judul.edit', compact(['rekap_judul','user']));
    }
    public function update(Request $req, RekapJudul $rekap_judul)
    {
        $rj = RekapJudul::findOrFail($rekap_judul->id);
        if($req->file('rekap_judul') != "")
        {
            Storage::disk('local')->delete('public/rekap_juduls/'.$rj->rekap_judul);
            $rekap_judul_file = $req->file('rekap_judul');
            $rekap_judul_file->storeAs('public/rekap_juduls', $rekap_judul_file->hashName());

            $rj->update([
                'rekap_judul' => $rekap_judul_file->hashname()
            ]);
        }
        if(!$rj){
            return redirect()->route('rekap-judul.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('rekap-judul.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $rekap_judul = RekapJudul::findOrFail($id);
        Storage::disk('local')->delete('public/rekap_juduls/'.$rekap_judul->rekap_judul);
        $rekap_judul->delete();

        if(!$rekap_judul)
        {
            return redirect()->route('rekap-judul.index')->with(['danger'=>'Data gagal dihapus!!']);
        }
        else
        {
            return redirect()->route('rekap-judul.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
