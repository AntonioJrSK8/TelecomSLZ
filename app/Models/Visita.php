<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Bootstrapper\Interfaces\TableInterface;

class Visita extends Model implements TableInterface
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'id',
            'telefone', 
            'aceita_visita', 
            'visitado', 
            'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    /**
     * createFully
     *
     * @param  mixed $data
     * @return void
     */
    public static function createFully($data)
    {
        /* informar dados do tipo cliente  */
        $data = $data + ['type' => 3, 'visitado'=>'0'];

        $validator = Validator::make($data, [
            'email'=> 'unique:users'
        ]);
        
        if ($validator->fails()) {

            $cliente_id = User::where('email', $data['email'])->get()->map(function ($user) {
                return $user->userable_id;
            })[0];

        } else {

            /** @var User $user */
            $user = User::createFully($data+['sendMail' => true]);
            $cliente_id = $user['user']->userable_id;
        }
        
        $visita = Visita::create($data+['cliente_id'=>$cliente_id]);
        $visita->telefone = $data['telefone'];
        $visita->aceita_visita = $data['aceita_visita'];
        
        // informações do cliente que fez cadastro para visitante 
        $visita->cliente->name = $data['name'];
        $visita->cliente->telefone = $data['telefone'];
        
        $visita->cliente->save();

        /** persistir no banco de dados */
    
        $visita->save();

        //if (isset($data['sendMail'])) {
        //    $token = \Password::broker()->createToken($user);
        //    $user->notify(new UserCreated($token));
        //}
        return compact('visita');
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['id', 'cliente', 'telefone', 'data chamado', 'visitado'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'id':
                return $this->id;
                break;
            case 'cliente':
                return $this->cliente->user->name;
                break;
            case 'telefone':
                return $this->telefone;
                break;
            case 'data chamado':
                return $this-> created_at->format('d/m/Y H:i:s');
                break;
            case 'visitado':
                return $this->visitado == '0'  ? 'Não' : 'Sim';
                break;
        }
    }
}
