<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchByCategoriesContoller extends Controller
{
    public function searchByCategories(Request $request) {
        $journey = Auth::user()->journey();

        if ($search = $request->tanggal) {
            $data = $journey->where('journey.tanggal', $search)
                            ->orWhereYear('journey.tanggal', $search)->paginate(10);
        } elseif ($search = $request->lokasi) {
            $data = $journey->where('journey.lokasi', $search)->paginate(10);
        } elseif ($search = $request->suhu) {
            $data = $journey->where('journey.suhu', $search)->paginate(10);
        } else {
            $data = $journey->paginate(10);

            $mode = $request->query('mode');
            $field = $request->query('field');

            if ($mode && $field) {
                $data = DB::table('journey')
                    ->orderBy($field, $mode)
                    ->paginate(10);
            }
        }
        return view('pages.dashboard', ['data' => $data]);
    }
}
