<?php

namespace App\Http\Controllers;

use App\Exports\RekapLaporanExport;
use App\Models\RekapLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class RekapLaporanController extends Controller
{
    public function index(Request $request)
    {
        $key = trim($request->q);
        if($key){            
            $rekapLaporans = RekapLaporan::where('judul','LIKE', "%$key%")
                                        ->orderBy('judul', 'ASC')
                                        ->paginate();
        }else{
            $rekapLaporans = RekapLaporan::orderBy('judul', 'ASC')
                                        ->paginate(10);
        }
        return view('rekap-laporan.index', ['rekapLaporans' => $rekapLaporans]);
    }
    public function show($id)
    {
        $rekapLaporan = RekapLaporan::findOrFail($id);
        return view('rekap-laporan.show', ['rekapLaporan' => $rekapLaporan]);
    }
    public function guest(Request $request)
    {
        $key = trim($request->q);
        if($key){            
            $rekapLaporans = RekapLaporan::where('judul','LIKE', "%$key%")
                                        ->orderBy('judul', 'ASC')
                                        ->paginate();
        }else{
            $rekapLaporans = RekapLaporan::orderBy('judul', 'ASC')
                                        ->paginate(10);
        }
        return view('rekap-laporan.index', ['rekapLaporans' => $rekapLaporans]);
    }
    public function create()
    {
        return view('rekap-laporan.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required'            
        ]);
        
        if($validator->fails())
            return redirect()->route('rekap-laporan.create')->withErrors($validator)->withInput();

        $store = RekapLaporan::create([
            'judul' => $request->judul,
            'dosen_pembimbing_1' => $request->dosen_pembimbing_1,
            'dosen_pembimbing_2' => $request->dosen_pembimbing_2,            
        ]);

        return redirect()->route('rekap-laporan.index')->with(['success' => 'Data berhasil disimpan!!']);
    }
    public function edit($id)
    {
        $edit = RekapLaporan::findOrFail($id);
        return view('rekap-laporan.edit', ['edit' => $edit]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required',            
        ]);
        
        if($validator->fails())
            return redirect()->route('rekap-laporan.edit', $id)->withErrors($validator)->withInput();
        
        $update = RekapLaporan::findOrFail($id);
        try {            
            $update->update([
                'judul' => $request->judul,
                'dosen_pembimbing_' => $request->dosen_pembimbing_1,
                'dosen_pembimbing_2' => $request->dosen_pembimbing_2,
                'link_drive' => $request->link_drive,
            ]);
            return redirect()->route('rekap-laporan.index')->with(['success' => 'Data berhasil disunting!!']);
        } catch (\Exception $e) {
            return redirect()->route('rekap-laporan.index')->with(['error' => 'Data gagal disunting!!']);
        }
    }
    public function destroy($id)
    {
        $delete = RekapLaporan::findOrFail($id);
        try {
            $delete->delete();
            return redirect()->route('rekap-laporan.index')->with(['success' => 'Data berhasil dihapus!!']);
        } catch (\Exception $e) {
            return redirect()->route('rekap-laporan.index')->with(['error' => 'Data gagal disimpan!!']);
        }
    }
    public function exportExcel()
    {
        return Excel::download(new RekapLaporanExport(), 'rekap-laporan.xlsx');
    }
    public function insertLink()
    {
        $data = RekapLaporan::get();
        return view('rekap-laporan.insert-link', ['data' => $data]);
    }
    public function storeLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link_drive' => 'required'
        ]);
        
        if($validator->fails())
            return redirect()->route('rekap-laporan.insertLink')->withErrors($validator)->withInput();

        $data = RekapLaporan::findOrFail($request->judul_id);        
        try {
            $data->update([
                'link_drive' => $request->link_drive
            ]);
            return redirect('mahasiswa/rekap-laporan')->with(['success' => 'Link berhasil ditambahkan!!']);
        } catch (\Exception $e) {
            return redirect('mahasiswa/rekap-laporan')->with(['error' => 'Link gagal ditambahkan!!']);
        }
    }
}