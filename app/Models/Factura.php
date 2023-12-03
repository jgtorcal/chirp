<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'fecha',
        'conceptos',
        'iva',
        'irpf',
        'base_imponible',
        'importe_total',

    ];
}
