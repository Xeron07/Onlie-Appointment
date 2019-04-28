<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    //
    protected $table="appointments";
    protected $primaryKey="aId";
    public $timestamps = false;
    protected $fillable = [
        'title',
        'time',
        'date',
        'duration',
        'perSession'
     ];
}
