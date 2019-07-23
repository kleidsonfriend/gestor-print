<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suprimento extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Tipo
     *
     * @var array
     */
    public static $tipoOptions = [
        1 => 'Tipo option 1',
        2 => 'Tipo option 2',
        3 => 'Tipo option 3',
        4 => 'Tipo option 4',
        5 => 'Tipo option 5',
    ];

    /**
     * Static options for the Referencia
     *
     * @var array
     */
    public static $referenciaOptions = [
        1 => 'Referencia option 1',
        2 => 'Referencia option 2',
        3 => 'Referencia option 3',
        4 => 'Referencia option 4',
        5 => 'Referencia option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 'referencia'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'tipo' => 'required|numeric',
            'referencia' => 'required|numeric',
        ];
    }

    /**
     * Returns the Tipo of the order
     *
     * @return string
     */
    public function getTipo()
    {
        return static::$tipoOptions[$this->tipo];
    }

    /**
     * Returns the Referencia of the order
     *
     * @return string
     */
    public function getReferencia()
    {
        return static::$referenciaOptions[$this->referencia];
    }

    /**
     * Get the impressoras for the Suprimento.
     */
    public function impressoras()
    {
        return $this->hasMany('App\Impressora');
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
