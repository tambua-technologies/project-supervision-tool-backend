<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubProjectProgressHistory extends Model
{
    use SoftDeletes;

    public $table = 'sub_project_progress_history';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sub_project_id',
        'progress_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sub_project_id' => 'integer',
        'progress_id' => 'integer',
    ];
}
