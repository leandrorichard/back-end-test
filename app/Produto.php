<?php

namespace App;

use App\Events\ProdutoCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use Notifiable;

    protected $table = "produtos";

    public $email = "leandro.richard.go@gmail.com";

    protected $dispatchesEvents = [
        'created' => ProdutoCreated::class,
    ];

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
