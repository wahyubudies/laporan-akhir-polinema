<?php

namespace App\Http\Controllers;

use App\Exports\PenilaianLaporanExport;
use App\Models\PenilaianLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PenilaianLaporanController extends Controller
{
    public function index(Request $request)
    {
        $key = trim($request->q);
        if($key){   
            $penilaianLaporans = PenilaianLaporan::where('judul', 'LIKE', "%$key%")
                                ->orderBy('judul', 'ASC')
                                ->paginate();
        }else{
            $penilaianLaporans = PenilaianLaporan::orderBy('judul', 'ASC')
                                ->paginate(10);
        }
        return view('penilaian-laporan.index', ['penilaianLaporans' => $penilaianLaporans]);
    }
    public function show($id)
    {
        $penilaianLaporan = PenilaianLaporan::findOrFail($id);
        return view('penilaian-laporan.show', ['penilaianLaporan' => $penilaianLaporan]);
    }
    public function guest(Request $request)
    {
        $key = trim($request->q);
        if($key){   
            $penilaianLaporans = PenilaianLaporan::where('judul', 'LIKE', "%$key%")
                                ->orderBy('judul', 'ASC')
                                ->paginate();
        }else{
            $penilaianLaporans = PenilaianLaporan::orderBy('judul', 'ASC')
                                ->paginate(10);
        }
        return view('penilaian-laporan.index', ['penilaianLaporans' => $penilaianLaporans]);
    }
    public function create()
    {
        return view('penilaian-laporan.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required',
            'nilai_dospem_1' => 'required',
            'nilai_dospem_2' => 'required',
            'dosen_penguji_1' => 'required',
            'dosen_penguji_2' => 'required',
            'nilai_dospeng_1' => 'required',
            'nilai_dospeng_2' => 'required'
        ]);
        
        if($validator->fails())
            return redirect()->route('penilaian-laporan.create')->withErrors($validator)->withInput();

        $store = PenilaianLaporan::create([
            'judul' => $request->judul,
            'dosen_pembimbing_1' => $request->dosen_pembimbing_1,
            'dosen_pembimbing_2' => $request->dosen_pembimbing_2,
            'nilai_dospem_1' => $request->nilai_dospem_1,
            'nilai_dospem_2' => $request->nilai_dospem_2,
            'dosen_penguji_1' => $request->dosen_penguji_1,
            'dosen_penguji_2' => $request->dosen_penguji_2,
            'nilai_dospeng_1' => $request->nilai_dospeng_1,
            'nilai_dospeng_2' => $request->nilai_dospeng_2 
        ]);

        return redirect()->route('penilaian-laporan.index')->with(['success' => 'Data berhasil disimpan!!']);
    }
    public function edit($id)
    {
        $data = PenilaianLaporan::findOrFail($id);
        return view('penilaian-laporan.edit', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required',
            'nilai_dospem_1' => 'required',
            'nilai_dospem_2' => 'required',
            'dosen_penguji_1' => 'required',
            'dosen_penguji_2' => 'required',
            'nilai_dospeng_1' => 'required',
            'nilai_dospeng_2' => 'required'
        ]);
        
        if($validator->fails())
            return redirect()->route('penilaian-laporan.edit', $id)->withErrors($validator)->withInput();
        
        $update = PenilaianLaporan::findOrFail($id);
        try {
            $update->update([
                'judul' => $request->judul,
                'dosen_pembimbing_1' => $request->dosen_pembimbing_1,
                'dosen_pembimbing_2' => $request->dosen_pembimbing_2,
                'nilai_dospem_1' => $request->nilai_dospem_1,
                'nilai_dospem_2' => $request->nilai_dospem_2,
                'dosen_penguji_1' => $request->dosen_penguji_1,
                'dosen_penguji_2' => $request->dosen_penguji_2,
                'nilai_dospeng_1' => $request->nilai_dospeng_1,
                'nilai_dospeng_2' => $request->nilai_dospeng_2 
            ]);
            return redirect()->route('penilaian-laporan.index')->with(['success' => 'Data berhasil disunting!!']);
        } catch (\Exception $e) {
            return redirect()->route('penilaian-laporan.index')->with(['error' => 'Data gagal disunting!!']);
        }
    }
    public function destroy($id)
    {
        $delete = PenilaianLaporan::findOrFail($id);
        try {
            $delete->delete();
            return redirect()->route('penilaian-laporan.index')->with(['success' => 'Data berhasil dihapus!!']);
        } catch (\Exception $e) {
            return redirect()->route('penilaian-laporan.index')->with(['error' => 'Data gagal disimpan!!']);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new PenilaianLaporanExport(), 'penilaian-laporan.xlsx');
    }
}
