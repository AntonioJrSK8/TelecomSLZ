<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visita;
use App\Forms\VisitaForm;
use Illuminate\Http\Request;
use App\Forms\VisitaConfForm;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisitaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        $visitas = Visita::where('visitado', '=', '0')->paginate(15);
        
        return view('admin.visitas.index', compact('visitas'));
    }

    public function visitaTecnica()
    {
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class, [
            'url' => route('admin.paginaController.store'),
            'method' => 'POST'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class);
        
        if (!$form->isValid()) 
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Visita::createFully($data);

        $request->session()->flash('message', 'Visita Técnica cadastrado com sucesso');

        return redirect()->route('principal');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function edit(Visita $visita)
    {
        $form = \FormBuilder::create(VisitaForm::class, [
            'url' => route('admin.visitatecnica.visitaConfirmada', ['visita' => $visita->id]),
            'method' => 'PUT',
            'model' => $visita
        ]);
        return view('admin.visitas.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visita $visita)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class, ['data' => ['id' => $visita->id]]);
        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        
        $visita->update($data);

        session()->flash('message', 'Visita técnica finalizada!');

        return redirect()->route('admin.visita.index');
    }

    public function visitaConfirmada($id)
    {
        $visita = Visita::find($id);
        $visita['visitado'] = 1;
        $visita->update();
        session()->flash('message', 'Visita técnica finalizada!');
        return redirect()->route('admin.visita.index');
    }
}
