<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documento';
    protected $primaryKey = 'documento_id';

    protected $fillable = [
        'numero',
        'archivo',
        'resumen',
        'fecha',
    ];
}
