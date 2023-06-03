<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Publicacionestatu extends Model
{
    use HasFactory;


    protected $fillable = [
        'foto',
        'categoria',
        'historia',
        'name',
        'last_name',
        'experiencia',
        'numero',
        'email',
        'pais',
        'user_id',
        'autorizado'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comentariostatus(): HasMany//esta relacion se llama topics
    {
        return $this->hasMany(Comentariostatu::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
        //y voy a acceder a ellos a travez de topics

}
