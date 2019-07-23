<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'tel', 'id_perfil', 'senha', 'perfil_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['senha'];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'nome' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'tel' => 'required|string|max:11',
            'id_perfil' => 'required|numeric',
            'senha' => 'required|string|max:191|confirmed',
            'perfil_id' => 'required|numeric|exists:perfils,id',
            'requisicaos' => 'required|array',
            'requisicaos.*' => 'required|numeric|exists:requisicaos,id',
        ];
    }

    /**
     * Get the perfil for the Usuario.
     */
    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    /**
     * Get the setors for the Usuario.
     */
    public function setors()
    {
        return $this->hasMany('App\Setor');
    }

    /**
     * Get the requisicaos for the Usuario.
     */
    public function requisicaos()
    {
        return $this->belongsToMany('App\Requisicao');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
