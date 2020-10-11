<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Bootstrapper\Interfaces\TableInterface;

class Produto extends Model implements TableInterface
{

    protected $fillable = ['name', 'descricao', 'especificacao', 
                           'fabricante', 'modelo', 'marca', 'precocompra', 'peso', 'ext'];

    public function getTableHeaders()
    {
        return ['id', 'Name', 'Descricao', 'Especificacao',
                'Fabricante', 'Modelo', 'Marca', 'Preco Compra', 'Peso'
        ];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'id':
                return $this->id;
                break;
            case 'Name':
                return $this->name;
                break;
            case 'Descricao':
                return $this->descricao;
                break;
            case 'Especificacao':
                return $this->especificacao;
                break;
            case 'Fabricante':
                return $this->fabricante;
                break;
            case 'Modelo':
                return $this->modelo;
                break;
            case 'Marca':
                return $this->marca;
                break;
            case 'Preco compra':
                return $this->precocompra;
                break;
            case 'Peso':
                return $this->peso;
                break;
        }
    }

    /**
     * createFully
     *
     * @param  mixed $data
     * @return void
     */
    public static function createFully($data)
    {
    
        /** @var User $produto */
        $produto = parent::create($data);

        /** persistir no banco de dados */
        $produto->save();

        return compact('produto');
    }
}
