<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Servico
     *
     * @var array
     */
    public static $servicoOptions = [
        1 => 'Servico option 1',
        2 => 'Servico option 2',
        3 => 'Servico option 3',
        4 => 'Servico option 4',
        5 => 'Servico option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'servico', 'descricao'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'servico' => 'required|numeric',
            'descricao' => 'required|string|max:191',
        ];
    }

    /**
     * Returns the Servico of the order
     *
     * @return string
     */
    public function getServico()
    {
        return static::$servicoOptions[$this->servico];
    }

    /**
     * Get the requisicaos for the Servico.
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
        return static::paginate(10);
    }
}
