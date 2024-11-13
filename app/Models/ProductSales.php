<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSales extends Model
{
    use HasFactory;
    protected $fillable = [
        'Device_id',
        'Container',
        'Weight_Sold',
        'Price',
        'Date',
        'Time'
    ];
}
