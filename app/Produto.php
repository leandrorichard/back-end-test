<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Produto extends Model
{
    protected $table = "produtos";

    protected $hidden = [
        "peso",
        "altura",
        "largura",
        "profundidade",
        "created_at",
        "updated_at",
    ];

    protected $fillable = array(
        "nome",
        "sku",
        "peso",
        "altura",
        "largura",
        "profundidade",
        "valor",
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public static function allByName(Request $request)
    {
        return self::where("nome", "like", "%{$request->input('nome')}%")->get();
    }
}
