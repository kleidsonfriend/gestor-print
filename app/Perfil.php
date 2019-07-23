<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Perfil
     *
     * @var array
     */
    public static $perfilOptions = [
        1 => 'Perfil option 1',
        2 => 'Perfil option 2',
        3 => 'Perfil option 3',
        4 => 'Perfil option 4',
        5 => 'Perfil option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'perfil', 'permissao'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'perfil' => 'required|numeric',
            'permissao' => 'required|string',
        ];
    }

    /**
     * Returns the Perfil of the order
     *
     * @return string
     */
    public function getPerfil()
    {
        return static::$perfilOptions[$this->perfil];
    }

    /**
     * Get the usuarios for the Perfil.
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
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
