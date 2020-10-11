<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visita;
use App\Forms\VisitaForm;
use Illuminate\Http\Request;
use App\Forms\VisitaConfForm;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cliente;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = \Auth::user()->userable_type;
        $id = \Auth::user()->userable;
        
        if ($tipo== 'App\Models\Cliente') {
            $visitas = Visita::where('visitado', '=', '0')
                       ->where('cliente_id', '=', $id->id)
                       ->paginate(15);
        } elseif ($tipo == 'App\Models\Tecnico'){
            $visitas = Visita::where('visitado', '=', '0')->paginate(15);
        } else {
            $visitas = Visita::paginate(15);
        }

        return view('admin.visitas.index', compact('visitas', 'tipo') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if (!$form->isValid()) {
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
     * Display the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function show(Visita $visita)
    {
        //
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
            'url' => route('admin.visita.update', ['visita' => $visita->id]),
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
        $form = \FormBuilder::create(VisitaConfForm::class, ['data' => ['id' => $visita->id]]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visita $visita)
    {
        //
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
