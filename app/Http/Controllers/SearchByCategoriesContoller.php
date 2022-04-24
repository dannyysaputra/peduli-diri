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
        $journeys = Auth::user()->journeyModels();

        if ($search = $request->tanggal) {
            $data = $journeys->where('journey.tanggal', $search)
                            ->orWhereYear('journey.tanggal', $search)->paginate(10);
        } elseif ($search = $request->lokasi) {
            $data = $journeys->where('journey.lokasi', 'like', '%'.$search.'%')->paginate(10);
        } elseif ($search = $request->suhu) {
            $data = $journeys->where('journey.suhu', 'like', '%'.$search.'%')->paginate(10);
        } else {
            $data = $journeys->paginate(10);

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
