<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMatcha extends Model
{
    protected $table      = 'data_matcha';
    protected $primaryKey = 'idsbr';
    public    $incrementing = false;
    protected $keyType    = 'string';
    protected $guarded    = [];

    // HAPUS $visible — biarkan controller yang handle SELECT
}