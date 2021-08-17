<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LogbookController extends Controller
{
    public function storeNarasi(Request $request, $idDataLogbook)
    {
        $rules = [
            'narasi' => 'required',
        ];
        $validated = Validator::make($request->all(), $rules);
        if($validated->fails())
            return Redirect::to('logbook')->withErrors($validated);
            
        try {
            $data = new Logbook;
            $data->narasi = $request->narasi;
            $data->data_logbook_id = $idDataLogbook;
            $data->save();

            return redirect()->route('logbook.index')->with(['success' => 'Data berhasil disimpan!!']);
        } catch (\Exception $th) {
            throw $th;
        }        
    }
    public function deleteNarasi($id)
    { 
        try {
            Logbook::find($id)->delete();
            return redirect()->route('logbook.index')->with(['success' => 'Data berhasil dihapus!!']);
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
