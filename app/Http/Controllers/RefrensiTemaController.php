<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\RefrensiTema;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefrensiTemaController extends Controller
{    
    protected $key;
    public function index(Request $request)
    {                
        $this->key = trim($request->q);
        if($this->key){          
            $dosens = Dosen::where('nama_dosen', 'LIKE', "%$this->key%")->orWhereHas('refrensi_temas', function(Builder $query){
                $query->where('tema', 'LIKE', "%$this->key%");
            })->orderBy('nama_dosen', 'ASC')->paginate();
            // $dosens = Dosen::where('nama_dosen', 'LIKE', "%$key%")->orderBy('nama_dosen', 'ASC')->paginate();
        }else{
            $dosens = Dosen::orderBy('nama_dosen', 'ASC')->paginate(10);
        }
        $user = Auth::user();        
        return view('refrensi-tema.index', compact(['dosens','user']));           
    }
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('refrensi-tema.show', ['dosen' => $dosen]);
    }
    public function guest(Request $request)
    {                
        $key = trim($request->q);
        if($key){            
            $dosens = Dosen::where('nama_dosen', 'LIKE', "%$key%")->orderBy('nama_dosen', 'ASC')->paginate();            
        }else{
            $dosens = Dosen::orderBy('nama_dosen', 'ASC')->paginate(10);
        }
        $user = Auth::user();        
        return view('refrensi-tema.index', compact(['dosens','user']));           
    }
    public function search(Request $request)
    {
        $from = Carbon::parse($request->from)
        ->startOfDay()
        ->toDateTimeString();
        $to = Carbon::parse($request->to)        
        ->endOfDay()
        ->toDateTimeString();
        $data = RefrensiTema::whereBetween('created_at', [$from,$to])->get();        
        return $data;
    }
    public function create()
    {
        $user = Auth::user();
        $dosens = Dosen::get(['id','nama_dosen']);
        return view('refrensi-tema.create', compact(['dosens','user']));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'tema' => 'required',
            'dosen_id' => 'required'
        ]);
        // dd($request->dosen_id);
        $refrensiTema = RefrensiTema::create([
            'tema' => $request->tema,
            'dosen_id' => $request->dosen_id
        ]);        
        if(!$refrensiTema)
        {
            return redirect()->route('refrensi-tema.index')->with(['error' => 'Data gagal disimpan!!']);            
        }else{
            return redirect()->route('refrensi-tema.index')->with(['success' => 'Data berhasil disimpan!!']);
        }
    }
    public function edit(RefrensiTema  $refrensiTema)
    {        
        $user = Auth::user();
        return view('refrensi-tema.edit', compact(['refrensiTema','user']));
    }
    public function update(Request $request, RefrensiTema $refrensiTema)
    {
        $this->validate($request, [
            'tema' => 'required'
        ]);        
        $refrensiTema = RefrensiTema::findOrFail($refrensiTema->id);        
        if($refrensiTema)
        {
            $refrensiTema->update([
                'tema' => $request->tema                
            ]);            
        }
        if(!$refrensiTema){
            return redirect()->route('refrensi-tema.index')->with(['danger' => 'Data gagal disunting!!']);
        }else{
            return redirect()->route('refrensi-tema.index')->with(['success' => 'Data berhasil disunting!!']);
        }
    }
    public function destroy($id)
    {
        $refrensiTema = RefrensiTema::findOrFail($id);
        $refrensiTema->delete();
        if(!$refrensiTema)
        {
            return redirect()->route('refrensi-tema.index')->with(['danger'=>'Data gagal dihapus!!']);            
        }
        else
        {
            return redirect()->route('refrensi-tema.index')->with(['success'=>'Data berhasil dihapus!!']);
        }
    }
}
