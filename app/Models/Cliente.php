<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model implements TableInterface
{
    protected $fillable = [
        'id', 'name', 'pj', 'telefone', 'aceite', 'visitado'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function visita()
    {
        return $this->hasMany('App\Models\Visita');
    }
    /**
     * createFully
     *
     * @param  mixed $data
     * @return void
     */
    public static function createFully($data)
    {
        /** @var User $user */
        $cliente = parent::create($data);  

        /** persistir no banco de dados */
        $cliente->save();

        //if (isset($data['sendMail'])) {
            //$token = \Password::broker()->createToken($cliente);
            //$cliente->notify(new UserCreated($token));
        //}
        return $cliente;
    }


    public function getTableHeaders()
    {
        return ['id', 'Nome', 'e-mail', 'Telefone'];//, 'PJ', 'Telefone', 'Aceite'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'id':
                return $this->id;
                break;
            case 'Nome':
                return $this->name;
                break;
            case 'e-mail':
                return $this->user->email;
                break;
            case 'Telefone':
                return $this->telefone;
                break;
            /* case 'PJ':
                return $this->pj;
                break;
            
            case 'Aceite':
                return $this->aceite;
                break;
            */

        }
    }
}
