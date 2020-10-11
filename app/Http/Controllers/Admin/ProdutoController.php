<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empresa;
use App\Models\Produto;
use App\Forms\VisitaForm;
use App\Forms\ProdutoForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrcamentoCreated;
use Illuminate\Notifications\Notifiable;

class ProdutoController extends Controller
{
    use Notifiable;
    public $email = '';

    public function index(){

        $produtos = Produto::paginate();
        return view('admin.produtos.index', compact('produtos'));
        
    }

    public function create()
    {
        $form = \FormBuilder::create(ProdutoForm::class, [
            'url' => route('admin.produto.store'),
            'method' => 'POST'
        ]);
        return view('admin.produtos.create', compact('form'));

    }

    public function store(Request $request)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(ProdutoForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        $data['ext'] = $request->hasFile('imagem') ? $request->imagem->extension(): '';

        $result = Produto::createFully($data);
        
        if ($request->hasFile('imagem')) {
            $request->imagem->storeAs('produtos', 'prd' . $result['produto']->id . '.' . $request->imagem->extension());
        }
        
        $request->session()->flash('message', 'Produto cadastrado com sucesso');

        return redirect()->route('admin.produto.index');
    }

    public function show(Produto $produto)
    {
        return view('admin.produtos.show', compact('produto'));
    }

    
    public function edit(Produto $produto)
    {
        $form = \FormBuilder::create(produtoForm::class, [
            'url' => route('admin.produto.update', ['produto' => $produto->id]),
            'method' => 'PUT',
            'enctype' => 'multipart/form-data',
            'model' => $produto
        ]);
        return view('admin.produtos.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(ProdutoForm::class, ['data' => ['id' => $produto->id]]);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        
        if ($request->hasFile('imagem')) {
            $data['ext'] = $request->imagem->extension();
            $request->imagem->storeAs('produtos', 'prd' . $produto->id . '.' . $request->imagem->extension());
        } 

        $produto->update($data);

        session()->flash('message', 'Produto alterado com sucesso');
        return redirect()->route('admin.produto.index');
    }


    public function detalheProduto($id)
    {
        $empresas = Empresa::find(1);
        $produtos = Produto::where('id','=', $id)->paginate();
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class, [
            'url' => route('admin.paginaController.store'),
            'method' => 'POST'
        ]);
            
        
        return view('admin.produtos.detalhes', compact('produtos', 'empresas', 'form'));
    } 

    public function orcamento(){
        $empresas = Empresa::find(1);
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class, [
            'url' => route('admin.paginaController.store'),
            'method' => 'POST'
        ]);

        return view('admin.produtos.orcamento', compact('empresas', 'form'));
    }

    public function gravaOrcamento(Request $request){

        $this->email = $request->email;
        
        $request->informacoes = $request->informacoes == '' ? 'Sem informações adicionais' : $request->informacoes;
        $this->notify(new OrcamentoCreated($request));

        $request->session()->flash('message', 'Orçamento registrado com sucesso');
        return redirect()->route('principal');
    }
}
