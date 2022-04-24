<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortingController extends Controller
{
    public function sorter(Request $request) {
        $mode = $request->query('mode');
        $field = $request->query('field');

        return redirect('/cari?mode='.$mode.'&field='.$field);
    }
}
