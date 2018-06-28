<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
