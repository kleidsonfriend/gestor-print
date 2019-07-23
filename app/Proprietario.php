<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proprietario extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Proprietario
     *
     * @var array
     */
    public static $proprietarioOptions = [
        1 => 'Proprietario option 1',
        2 => 'Proprietario option 2',
        3 => 'Proprietario option 3',
        4 => 'Proprietario option 4',
        5 => 'Proprietario option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proprietario'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'proprietario' => 'required|numeric',
        ];
    }

    /**
     * Returns the Proprietario of the order
     *
     * @return string
     */
    public function getProprietario()
    {
        return static::$proprietarioOptions[$this->proprietario];
    }

    /**
     * Get the requisicaos for the Proprietario.
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
