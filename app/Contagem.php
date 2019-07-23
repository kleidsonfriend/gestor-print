<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contagem extends Model
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
        'id_impressora', 'contagem', 'data', 'impressora_id', 'requisicao_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'id_impressora' => 'required|numeric',
            'contagem' => 'required|numeric',
            'data' => 'required|date',
            'impressora_id' => 'required|numeric|exists:impressoras,id',
            'requisicao_id' => 'required|numeric|exists:requisicaos,id',
        ];
    }

    /**
     * Get the impressora for the Contagem.
     */
    public function impressora()
    {
        return $this->belongsTo('App\Impressora');
    }

    /**
     * Get the requisicao for the Contagem.
     */
    public function requisicao()
    {
        return $this->belongsTo('App\Requisicao');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['impressora', 'requisicao'])->paginate(10);
    }
}
