<?php

namespace App\Http\Controllers;

use App\Models\FormUpload;
use Illuminate\Http\Request;

class FormUploadController extends Controller
{
    public function create()
    {
        return view('form');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'nim_mhs_1' => 'required',        
            'nama_mhs_1' => 'required',            
            'nim_mhs_2' => 'required',            
            'nama_mhs_2' => 'required',            
            'judul' => 'required',            
            'dosen_pmb_1' => 'required',            
            'dosen_pmb_2' => 'required',            
            'dosen_pgj_1' => 'required',            
            'dosen_pgj_2' => 'required',                        
            'file_upload' => 'required|mimes:zip,rar|max:10048'
        ]);
        $file_upload = $req->file('file_upload');
        $file_upload->storeAs('public/form_uploads', $file_upload->hashName());
        $form = FormUpload::create([
            'nim_mhs_1' => $req->nim_mhs_1,        
            'nama_mhs_1' => $req->nama_mhs_1,            
            'nim_mhs_2' => $req->nim_mhs_2,            
            'nama_mhs_2' => $req->nama_mhs_2,            
            'judul' => $req->judul,            
            'dosen_pmb_1' => $req->dosen_pmb_1,            
            'dosen_pmb_2' => $req->dosen_pmb_2,            
            'dosen_pgj_1' => $req->dosen_pgj_1,            
            'dosen_pgj_2' => $req->dosen_pgj_2, 
            'file_upload' => $file_upload->hashName()
        ]);
        if(!$form)
        {
            return redirect()->route('form.create')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('form.create')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
}
