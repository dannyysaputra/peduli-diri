<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JourneyController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function catatanPerjalanan() {
        $data = Auth::user()->journey()->paginate(10);
        return view('pages.dashboard', ['data' => $data]);
    }

    public function inputTable() {
        return view('pages.input-data');
    }

    public function exportpdf(){
        $data = Journey::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('/pages/datajourney-pdf');
        
        return $pdf->download('data-perjalanan.pdf');
    }

    public function createData(Request $request) {
        $validateData = Validator::make($request->all(), [
            'suhu' => 'digits:2',
        ])->validate();
    
        $user_id = Auth::user()->id;
        
        $data = [
            'user_id' => $user_id,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'suhu' => $validateData['suhu'],
        ];

        Journey::create($data);
        return redirect('/catatan-perjalanan')->with('message', 'Data berhasil disimpan');
    }

    public function deleteData($id) 
    {
        $data = Journey::where('id', $id)->delete();

        Journey::deleted($data);
        return redirect('/catatan-perjalanan')->with('message', 'Data berhasil dihapus!');
    }

    public function ubahData($id)
    {
        $data = Journey::select('*')
                    ->where('id', $id)
                    ->get();
        
        return view('pages.ubah-data', ['data' => $data]);
    }

    public function updateData(Request $request) 
    {
        $data = Journey::where('id', $request->id)
        ->update([
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'suhu' => $request->suhu,
        ]);

        return redirect('/catatan-perjalanan')->with('message', 'Data berhasil diubah!');
    }
}
