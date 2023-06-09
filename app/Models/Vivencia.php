<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vivencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'vivencia',
        'user_id'
 
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
{
    return $this->hasMany(Comentariovivencia::class);
}


}
