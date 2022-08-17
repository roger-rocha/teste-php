<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = "colaboradores";
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'telefone', 'email', 'data_nascimento', 'id_empresa'];

    public static function getColaborador($id_empresa, $mes){
        $records = DB::table('colaboradores')->select('id', 'nome', 'telefone', 'email', 'data_nascimento', 'id_empresa')->where('id_empresa','=',$id_empresa)->whereMonth('data_nascimento', $mes)->get()->toArray();
        return $records;
    }

}
