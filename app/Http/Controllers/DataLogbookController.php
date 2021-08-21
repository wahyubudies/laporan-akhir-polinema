<?php

namespace App\Http\Controllers;

use App\Exports\DataLogbookExport;
use App\Models\DataLogbook;
use App\Models\Logbook;
use App\Models\QrCode as ModelsQrCode;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataLogbookController extends Controller
{    
    public function index()
    {
        $idUser = Auth::user()->id;
        $DataLogbook = DataLogbook::select(
            'id',
            'judul',
            'qrcode_dospem1',
            'dospem1',
            'dospem2',
            'qrcode_dospem2',
            'created_at')
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
    public function show($idUser)
    {
        $DataLogbook = DataLogbook::select(
            'id',
            'judul',
            'qrcode_dospem1',
            'dospem1',
            'dospem2',
            'qrcode_dospem2',
            'created_at')
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
    public function listLogbook(Request $request)
    {
        $data = DataLogbook::whereHas('user', function($query){
            $query->where('users.role', 'mahasiswa');
        });

        $search = trim($request->q);
        if($search)
            $dataLogbooks = $data->where('judul', 'like', '%' . $search . '%')->paginate(10);

        $dataLogbooks = $data->paginate(10);
        
        return view('data-logbook.list-data-logbook', [
            'dataLogbooks' => $dataLogbooks
        ]);
    }
    public function exportExcel()
    {
        return Excel::download(new DataLogbookExport(), time() . '_' . 'data-logbook' . '.xlsx');        
    }
    public function generateQrCode1($idDataLogbook)
    {
        $filenameQrcode = time() . '_' . Auth::user()->name . '_' . 'dospem1' . '.png';        

        $data = DataLogbook::find($idDataLogbook);
        $data->qrcode_dospem1 = $filenameQrcode;
        $data->save();        

        $dataQrCode = Auth::user()->name . '_' . $data->updated_at->format('d M Y');
        QrCode::size(200)
                ->format('png')          
                ->generate($dataQrCode, storage_path('app/public/qrcode/' . $filenameQrcode));
        
        return redirect()->route('logbook.show', $data->user->id)->with(['success' => 'QR Code berhasil ditambahkan']);
    }
    public function generateQrCode2($idDataLogbook)
    {
        $filenameQrcode = time() . '_' . Auth::user()->name . '_' . 'dospem2' . '.png';        

        $data = DataLogbook::find($idDataLogbook);
        $data->qrcode_dospem2 = $filenameQrcode;
        $data->save();        

        $dataQrCode = Auth::user()->name . '_' . $data->updated_at->format('d M Y');
        QrCode::size(200)
                ->format('png')          
                ->generate($dataQrCode, storage_path('app/public/qrcode/' . $filenameQrcode));
        
        return redirect()->route('logbook.show', $data->user->id)->with(['success' => 'QR Code berhasil ditambahkan']);
    }
    public function qrcodeGenerator()
    {
        return view('data-logbook.qrcode-generator');
    }
    public function qrcodeGeneratorStore(Request $request)
    {
        $this->validate($request,[
            'pembimbing' => 'required',
            'mahasiswa' => 'required'
        ]);        

        $pembimbing = $request->pembimbing;
        $mahasiswa = $request->mahasiswa;

        $filenameQrcode = time() . '_' . 'Qr-Code' . '_' . Carbon::now()->format('d-m-Y') . '.png';
        
        $dataQrCode = "Dosen : " . $pembimbing . "\n" . "Mahasiswa : " . $mahasiswa . "\n" . "Tanggal : " . Carbon::now()->format('d-m-Y');
        $qrCode = QrCode::encoding('UTF-8')
        ->size(200)
        ->format('png')          
        ->generate($dataQrCode, storage_path('app/public/qrcode/' . $filenameQrcode));

        $data = new ModelsQrCode();
        $data->pembimbing = $pembimbing;
        $data->mahasiswa = $mahasiswa;
        $data->qrcode = $filenameQrcode;
        $data->tanggal = Carbon::now()->format('d-m-Y');
        $data->save();        
                
        return view('data-logbook.qrcode-show', [
            'data' => $data
        ]);
    }
    public function qrcodeGeneratorDownlaod($idQrcode)
    {
        $data = ModelsQrCode::find($idQrcode);
        $path = storage_path() . '/app/public/qrcode/' . $data->qrcode;
        return response()->download($path, $data->qrcode, ['Content-Type: image/png']);
    }
}
