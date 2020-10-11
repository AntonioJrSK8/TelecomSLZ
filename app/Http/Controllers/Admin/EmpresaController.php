<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empresa;
use App\Forms\EmpresaForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();
        return view('admin.empresas.index', compact('empresas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $form = \FormBuilder::create(EmpresaForm::class, [
            'url' => route('admin.empresa.update', ['empresa' => $empresa->id]),
            'method' => 'PUT',
            'enctype' => 'multipart/form-data',
            'model' => $empresa
        ]);
        return view('admin.empresas.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(EmpresaForm::class, ['data' => ['id'=>$empresa->id]]);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        if ($request->hasFile('imagem')) {
            $data['imagem'] = strtolower(config('app.name')) . '.' . $request->imagem->extension();
            $data['urlimage'] = '/storage/empresa/'. $data['imagem'];
            $request->imagem->storeAs('empresa', $data['imagem'] );
        }

        $empresa->update($data);

        session()->flash('message', 'Empresa alterado com sucesso');
        return redirect()->route('admin.empresa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
