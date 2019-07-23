<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Impressora extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Impressora
     *
     * @var array
     */
    public static $impressoraOptions = [
        1 => 'Impressora option 1',
        2 => 'Impressora option 2',
        3 => 'Impressora option 3',
        4 => 'Impressora option 4',
        5 => 'Impressora option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_suprimento', 'impressora', 'modelo', 'descricao', 'id_proprietario', 'suprimento_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'id_suprimento' => 'required|numeric',
            'impressora' => 'required|numeric',
            'modelo' => 'required|string',
            'descricao' => 'required|string|max:191',
            'id_proprietario' => 'required|numeric',
            'suprimento_id' => 'required|numeric|exists:suprimentos,id',
        ];
    }

    /**
     * Returns the Impressora of the order
     *
     * @return string
     */
    public function getImpressora()
    {
        return static::$impressoraOptions[$this->impressora];
    }

    /**
     * Get the suprimento for the Impressora.
     */
    public function suprimento()
    {
        return $this->belongsTo('App\Suprimento');
    }

    /**
     * Get the contagems for the Impressora.
     */
    public function contagems()
    {
        return $this->hasMany('App\Contagem');
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
