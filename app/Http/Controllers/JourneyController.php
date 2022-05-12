<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function createData(Request $request) {
        $user_id = Auth::user()->id;
        
        $data = [
            'user_id' => $user_id,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'suhu' => $request->suhu,
        ];

        Journey::create($data);
        return redirect('/catatan-perjalanan')->with('message', 'Data berhasil disimpan');
    }
}
