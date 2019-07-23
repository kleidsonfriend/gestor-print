<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Setor
     *
     * @var array
     */
    public static $setorOptions = [
        1 => 'Setor option 1',
        2 => 'Setor option 2',
        3 => 'Setor option 3',
        4 => 'Setor option 4',
        5 => 'Setor option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setor', 'sigla', 'gerente', 'usuario_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'setor' => 'required|numeric',
            'sigla' => 'required|string',
            'gerente' => 'required|numeric',
            'usuario_id' => 'required|numeric|exists:usuarios,id',
        ];
    }

    /**
     * Returns the Setor of the order
     *
     * @return string
     */
    public function getSetor()
    {
        return static::$setorOptions[$this->setor];
    }

    /**
     * Get the usuario for the Setor.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    /**
     * Get the requisicaos for the Setor.
     */
    public function requisicaos()
    {
        return $this->hasMany('App\Requisicao');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['usuario'])->paginate(10);
    }
}
