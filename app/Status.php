<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * Static options for the Status
     *
     * @var array
     */
    public static $statusOptions = [
        1 => 'Status option 1',
        2 => 'Status option 2',
        3 => 'Status option 3',
        4 => 'Status option 4',
        5 => 'Status option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'status' => 'required|numeric',
        ];
    }

    /**
     * Returns the Status of the order
     *
     * @return string
     */
    public function getStatus()
    {
        return static::$statusOptions[$this->status];
    }

    /**
     * Get the requisicaos for the Status.
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
