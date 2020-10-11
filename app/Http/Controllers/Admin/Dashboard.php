<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visita;

class Dashboard extends Controller
{
    
    public function index()
    {
        $empresas = Empresa::All()->find(1);
        
        $chAberto = str_pad(Visita::All()->count(), 4, '0', STR_PAD_LEFT);
        $chPendente = str_pad(Visita::Where('visitado', '=', '0')->count(), 4, '0', STR_PAD_LEFT);
        $chFinalizado = str_pad(Visita::Where('visitado', '=', '1')->count(), 4, '0', STR_PAD_LEFT);
        $chAtrasado = str_pad(Visita::Where('visitado', '=', '0')
                      ->Where('created_at', '>', date('Y/m/d', strtotime('+2 days', strtotime(date("Y/m/d")))))
                      ->count(), 4, '0', STR_PAD_LEFT);
        
        return view('admin.dashboard', compact('empresas', 'chAberto', 'chPendente', 'chFinalizado', 'chAtrasado'));
    }

}
