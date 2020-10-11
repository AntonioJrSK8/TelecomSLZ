<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Notifications\UserCreated;
use Illuminate\Notifications\Notifiable;
use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User
 */
class User extends Authenticatable implements TableInterface
{
    use Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_TECNICO = 2;
    const ROLE_CLIENTE = 3; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'enrolment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userable(){
        return $this->morphTo();
    }

    public function profile(){
        return $this->hasOne(UserProfiles::class)->withDefault();
    }

    public static function assignEnrolment(User $user, $type){
        $types = [
            self::ROLE_ADMIN   => 1000,
            self::ROLE_TECNICO => 2000,
            self::ROLE_CLIENTE => 3000,
        ];
        $user->enrolment = $types[$type] + $user->id;
        return $user->enrolment;
    }

    public static function assignRole(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_TECNICO => Tecnico::class,
            self::ROLE_CLIENTE => Cliente::class,
        ];

        $model = $types[$type];
        
        if($model == 'App\Models\Cliente')
            $model = $model::create(['name'=>$user->name]);
        else 
            $model = $model::create([]);
        
        $user->userable()->associate($model);

    }
    /**
     * createFully
     *
     * @param  mixed $data
     * @return void
     */
    public static function createFully($data){
        $password = 'secret'; //Str::random(6);
        $data['password'] =  bcrypt($password); //Crypt::encrypt($password);
        
        /** @var User $user */
        $user = parent::create($data+['enrolment' => Str::random(6)]);
        
        self::assignEnrolment($user, $data['type']);
        self::assignRole($user, $data['type']);

        /** persistir no banco de dados */
        $user->save();

        if(isset($data['sendMail'])) {      
            
            
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }

        return compact('user','password');
    }
    
    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders(){
        return ['id', 'Name', 'E-mail', 'Type'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header){
        switch ($header) {
            case 'id':
                return $this->id;
                break;
            case 'Name':
                return $this->name;
                break;
            case 'E-mail':
                return $this->email;
                break;
            case 'Type':
                return explode("\\", $this->userable_type)[2];
                break;
        }
    }
}
