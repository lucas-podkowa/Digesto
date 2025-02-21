<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresa';

    protected $fillable = [
        'razon_social',
        'cuit'
    ];

    // Define relationship to Convenio
    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'empresa_id');
    }
}
