<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = ['deputado_id', 'tipo_despesa', 'valor', 'data', 'fornecedor', 'documento'];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class);
    }
}
