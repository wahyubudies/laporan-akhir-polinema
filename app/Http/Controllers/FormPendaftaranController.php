<?php

namespace App\Http\Controllers;

use App\Exports\FormPendaftaransExport;
use App\Models\FormPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class FormPendaftaranController extends Controller
{
    public function index(Request $req)
    {
        $key = trim($req->q);
        if($key)
            $forms = FormPendaftaran::
                                where('judul','LIKE',"%$key%")
                                ->orWhere('nim_mhs_1','LIKE',"%$key%")
                                ->orWhere('nim_mhs_2','LIKE',"%$key%")
                                ->orWhere('nama_mhs_1','LIKE',"%$key%")
                                ->orWhere('nama_mhs_2','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_1','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_2','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_3','LIKE',"%$key%")
                                ->orderBy('nim_mhs_1', 'ASC')
                                ->paginate();
        else
            $forms = FormPendaftaran::orderBy('nim_mhs_1', 'ASC')->paginate(10);
        return view('form-pendaftaran.index', ['forms'=>$forms]);
    }
    public function guest(Request $req)
    {
        $key = trim($req->q);
        if($key)
            $forms = FormPendaftaran::
                                where('judul','LIKE',"%$key%")
                                ->orWhere('nim_mhs_1','LIKE',"%$key%")
                                ->orWhere('nim_mhs_2','LIKE',"%$key%")
                                ->orWhere('nama_mhs_1','LIKE',"%$key%")
                                ->orWhere('nama_mhs_2','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_1','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_2','LIKE',"%$key%")
                                ->orWhere('dosen_penyeleksi_3','LIKE',"%$key%")
                                ->orderBy('nim_mhs_1', 'ASC')
                                ->paginate();
        else
            $forms = FormPendaftaran::orderBy('nim_mhs_1', 'ASC')->paginate();
        return view('form-pendaftaran.index', ['forms'=>$forms]);
    }
    public function show($id)
    {
        $form = FormPendaftaran::findOrFail($id);
        return view('form-pendaftaran.show', ['form'=>$form]);
    }
    public function detail($id)
    {
        $form = FormPendaftaran::findOrFail($id);
        return view('form-pendaftaran.show', ['form'=>$form]);
    }
    public function create()
    {
        return view('form-pendaftaran.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'nim_mhs_1' => 'required',
            'nama_mhs_1' => 'required',
            'judul' => 'required',
            'dosen_penyeleksi_1' => 'required',
            'file_upload' => 'required|mimes:pdf,docs,doc|max:2048'
        ]);
        $file_upload = $req->file('file_upload');
        $file_upload->storeAs('public/form_pendaftarans', $file_upload->hashName());        
        $form = FormPendaftaran::create([
            'nim_mhs_1' =>  $req->nim_mhs_1,
            'nim_mhs_2' =>  $req->nim_mhs_2,
            'nama_mhs_1' => $req->nama_mhs_1,
            'nama_mhs_2' => $req->nama_mhs_2,
            'judul' => $req->judul,
            'dosen_penyeleksi_1' => $req->dosen_penyeleksi_1,
            'dosen_penyeleksi_2' => $req->dosen_penyeleksi_2,
            'dosen_penyeleksi_3' => $req->dosen_penyeleksi_3,
            'file_upload' => $file_upload->hashName(),
        ]);
        if(!$form)
        {
            return redirect()->route('form-pendaftaran.guest')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('form-pendaftaran.guest')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function destroy($id)
    {
        $form = FormPendaftaran::findOrFail($id);
        Storage::disk('local')->delete('public/form_pendaftarans/'.$form->file_upload);
        $form->delete();

        if(!$form)
        {
            return redirect()->route('form-pendaftaran.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('form-pendaftaran.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
    public function edit($id)
    {
        $user = Auth::user();        
        $form = FormPendaftaran::findOrFail($id);
        return view('form-pendaftaran.edit', ['form' => $form]);
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nim_mhs_1' => 'required',
            'nama_mhs_1' => 'required',
            'judul' => 'required',
            'dosen_penyeleksi_1' => 'required'
        ]);
        $form = FormPendaftaran::findOrFail($id);
        // dd($form);
        if($req->file('file_upload') == ""){
            $form->update([
                'nim_mhs_1' =>  $req->nim_mhs_1,
                'nim_mhs_2' =>  $req->nim_mhs_2,
                'nama_mhs_1' => $req->nama_mhs_1,
                'nama_mhs_2' => $req->nama_mhs_2,
                'judul' => $req->judul,
                'dosen_penyeleksi_1' => $req->dosen_penyeleksi_1,
                'dosen_penyeleksi_2' => $req->dosen_penyeleksi_2,
                'dosen_penyeleksi_3' => $req->dosen_penyeleksi_3
            ]);
        }
        else{
            Storage::disk('local')->delete('public/form_pendaftarans/'.$form->file_upload);
            $file_upload = $req->file('file_upload');
            $file_upload->storeAs('public/form_pendaftarans', $file_upload->hashName());
            $form->update([
                'nim_mhs_1' =>  $req->nim_mhs_1,
                'nim_mhs_2' =>  $req->nim_mhs_2,
                'nama_mhs_1' => $req->nama_mhs_1,
                'nama_mhs_2' => $req->nama_mhs_2,
                'judul' => $req->judul,
                'dosen_penyeleksi_1' => $req->dosen_penyeleksi_1,
                'dosen_penyeleksi_2' => $req->dosen_penyeleksi_2,
                'dosen_penyeleksi_3' => $req->dosen_penyeleksi_3,
                'file_upload' => $file_upload->hashName(),
            ]);
        }
        if(!$form){
            return redirect()->route('form-pendaftaran.index')->with(['danger' => 'Data gagal disunting!!']);
        }
        else{
            return redirect()->route('form-pendaftaran.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function fileExport() 
    {
        return Excel::download(new FormPendaftaransExport, 'form-pendaftaran.xlsx');
    }
}