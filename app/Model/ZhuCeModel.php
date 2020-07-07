<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ZhuCeModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'zhuce';
    public $timestamps = false;
    protected $guarded = [];
}
