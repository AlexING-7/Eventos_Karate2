<?php

namespace App\Http\Controllers\kata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class panelcontrol extends Controller
{
    public function index($id_combate)
    {
        return view('Scoreboards.PanelKata', ['id_combate' => $id_combate]);
    }
    public function live($id_combate)
    {
        return view('Scoreboards.katalive', ['id_combate' => $id_combate]);
    }
}
