<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'Device_Id',
        'Container1',
        'Container2',

    ];
}
