<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
    protected $table = 'convenio';
    protected $primaryKey = 'convenio_id';
    protected $fillable = [
        'numero',
        'archivo',
        'resumen',
        'texto',
        'fecha',
        'tipo_convenio_id',
        'empresa_id'
    ];
    protected $dates = ['fecha'];

    public function tipo()
    {
        return $this->belongsTo(TipoConvenio::class, 'tipo_convenio_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
