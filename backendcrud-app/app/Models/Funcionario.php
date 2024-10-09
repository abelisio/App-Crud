<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'endereco',
        'tel',
    ];
    use HasFactory;
}
