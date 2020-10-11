<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visita;
use App\Models\Empresa;
use App\Models\Produto;
use App\Forms\VisitaForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class paginaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::All()->find(1);

        $form = $this->frm_Visita();
        
        $chAberto = 1;
        $chPendente = 2;
        $chFinalizado = 3;
        $chAtrasado = 4;

        return view('principal', compact('empresas', 'form'));
    }
    public function frm_Visita(){
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class, [
            'url' => route('admin.paginaController.store'),
            'method' => 'POST'
        ]);
        return $form;
    }
    public function listaProduto(Request $request)
    {
        $empresas = Empresa::All()->find(1);
        $produtos = Produto::paginate();
        
        $form = $this->frm_Visita();

        return view('admin.produtos.lista', compact('empresas', 'form', 'produtos'));

    }

    public function buscaProduto(Request $request)
    {
        $str = $request->nameprd;
        $empresas = Empresa::All()->find(1);

        //$produtos = Produto::paginate();
        $produtos = Produto::where('name', 'like', '%' . $str . '%')->
                              orwhere('descricao', 'like', '%'.$str.'%')->get();

        $form = $this->frm_Visita();
        return view('admin.produtos.lista', compact('empresas', 'form', 'produtos'));
    }

    public function store(Request $request){
        
        /** @var Form $form */
        $form = \FormBuilder::create(VisitaForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        } elseif (strlen(strstr($form->getFieldValues()["name"], " "))==0) {
            $request->session()->flash('message', 'Sua solicitação não foi registrada favor preencher Nome e Sobrenome!');
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        Visita::createFully($data);
        $request->session()->flash('message', 'Prezado Cliente, aguarde que entraremos em contato para agendar a visita técnica!');
        return redirect()->route('principal');
    }

}
