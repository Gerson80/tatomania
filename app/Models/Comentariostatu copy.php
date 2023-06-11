<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Publicacionestatu;
use App\Models\User;

class Comentariostatu extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'user_id',
        'vivencia_id'
 
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function publicacionestatu(): BelongsTo
    {
        return $this->belongsTo(Publicacionestatu::class);
    }

    public function liketats(): HasMany//esta relacion se llama topics
    {
        return $this->hasMany(Liketat::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
        //y voy a acceder a ellos a travez de topics
        //topics va regresar todos lo temas relacionados a el subject
}
