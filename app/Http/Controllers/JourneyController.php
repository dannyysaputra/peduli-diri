<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function catatanPerjalanan() {
        $data = DB::table('journey')->paginate(10);
        return view('pages.dashboard', ['data' => $data]);
    }

    public function inputTable() {
        return view('pages.input-data');
    }

    public function createData(Request $request) {
        $data = [
            'id_user' => 1,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'suhu' => $request->suhu,
        ];

        Journey::create($data);
        return redirect('/catatan-perjalanan')->with('message', 'Data berhasil disimpan');
    }
}
