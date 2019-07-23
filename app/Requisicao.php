<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisicao extends Model
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
        'id_servico', 'id_contagem', 'resumo', 'criado_por', 'avaliado_por', 'executado_por', 'concluido_por', 'criado_em', 'avaliado_em', 'executado_em', 'concluido_em', 'id_setor', 'id_status', 'proprietario_id', 'servico_id', 'setor_id', 'status_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'id_servico' => 'required|numeric',
            'id_contagem' => 'required|numeric',
            'resumo' => 'required|string',
            'criado_por' => 'required|numeric',
            'avaliado_por' => 'required|numeric',
            'executado_por' => 'required|numeric',
            'concluido_por' => 'required|numeric',
            'criado_em' => 'required|date',
            'avaliado_em' => 'required|date',
            'executado_em' => 'required|date',
            'concluido_em' => 'required|date',
            'id_setor' => 'required|numeric',
            'id_status' => 'required|numeric',
            'proprietario_id' => 'required|numeric|exists:proprietarios,id',
            'servico_id' => 'required|numeric|exists:servicos,id',
            'setor_id' => 'required|numeric|exists:setors,id',
            'status_id' => 'required|numeric|exists:statuses,id',
        ];
    }

    /**
     * Get the proprietario for the Requisicao.
     */
    public function proprietario()
    {
        return $this->belongsTo('App\Proprietario');
    }

    /**
     * Get the servico for the Requisicao.
     */
    public function servico()
    {
        return $this->belongsTo('App\Servico');
    }

    /**
     * Get the contagems for the Requisicao.
     */
    public function contagems()
    {
        return $this->hasMany('App\Contagem');
    }

    /**
     * Get the setor for the Requisicao.
     */
    public function setor()
    {
        return $this->belongsTo('App\Setor');
    }

    /**
     * Get the status for the Requisicao.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * Get the usuarios for the Requisicao.
     */
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['servico'])->paginate(10);
    }
}
