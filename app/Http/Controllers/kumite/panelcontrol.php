<?php

namespace App\Http\Controllers\kumite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class panelcontrol extends Controller
{
    public function index($id_combate)
    {
        return view('Scoreboards.PanelKumite', ['id_combate' => $id_combate]);
    }
}
