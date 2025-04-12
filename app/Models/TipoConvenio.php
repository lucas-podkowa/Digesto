<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    use HasFactory;
    protected $table = 'tipo_convenio';
    protected $primaryKey = 'tipo_convenio_id';
    protected $fillable = ['nombre', 'descripcion', 'activo'];

    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'tipo_convenio_id');
    }
}
