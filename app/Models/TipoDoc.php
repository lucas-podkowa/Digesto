<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    use HasFactory;
    protected $table = 'tipo_doc';
    protected $primaryKey = 'tipo_doc_id';
    protected $fillable = ['nombre', 'descripcion'];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'tipo_doc_id');
    }
}
