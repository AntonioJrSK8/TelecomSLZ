<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Bootstrapper\Interfaces\TableInterface;

class Empresa extends Model implements TableInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'urlimage'
    ];


    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders(){
        return ['id', 'Name', 'urlimage'];
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
            case 'urlimage':
                return $this->urlimage;
                break;
        }
    }
}
