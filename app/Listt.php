<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listt extends Model
{
    //
    protected $table = 'moti_lists';
    protected $fillable = [
        'surname', 'name', 'partronic','born','gender',
        'klass','prefiks','case','document','address',
        'snils','movement','arrival','order_pr',
        'departure','order_ub'
    ];



}
