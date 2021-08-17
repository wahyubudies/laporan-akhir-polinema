<?php

namespace App\Http\Controllers;

use App\Models\DataLogbook;
use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DataLogbookController extends Controller
{    
    public function index()
    {
        $idUser = Auth::user()->id;
        $DataLogbook = DataLogbook::select(
            'data_logbooks.id',
            'data_logbooks.judul',
            'data_logbooks.dospem1',
            'data_logbooks.dospem2',
            'data_logbooks.created_at')
            ->where('user_id', $idUser)
            ->first();
        $Logbook = Logbook::where('data_logbook_id', $DataLogbook->id ?? null)
            ->select(
                'id',
                'created_at',
                'narasi'
            )
            ->get();
        return view('data-logbook.index', [
            'DataLogbook' => $DataLogbook,
            'Logbook' => $Logbook
        ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'dospem_1' => 'required',
            'dospem_2' => 'required',
        ];
        $validated = Validator::make($request->all(), $rules);
        if($validated->fails())
            return Redirect::to('logbook')->withErrors($validated);

        $id = Auth::user()->id;
        $data= new DataLogbook;
        $data->judul = $request->judul;
        $data->dospem1 = $request->dospem_1;
        $data->dospem2 = $request->dospem_2;
        $data->user_id = $id;
        $data->save();        
        
        return redirect()->route('logbook.index')->with(['success' => 'Data berhasil ditambah!!']);
    }
    public function listLogbook()
    {
        return view('data-logbook.list-data-logbook');
    }
}
