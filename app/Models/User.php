<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Publicacionestatu;
use App\Models\Encuesta;
use App\Models\Comentariostatu;
use App\Models\Vivencia;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.aaaaaaa
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'edad',
        'foto',
        'status',
        'estado',
        'email',
        'password',
        'admision',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function encuestas(): HasMany//esta relacion se llama topics
    {
        return $this->hasMany(Encuesta::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
        //y voy a acceder a ellos a travez de topics
        //topics va regresar todos lo temas relacionados a el subject


    public function publicacionestatus(): HasMany//esta relacion se llama topics
    {
        return $this->hasMany(Publicacionestatu::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
        //y voy a acceder a ellos a travez de topics
        //topics va regresar todos lo temas relacionados a el subject

   

    public function comentariostatus(): HasMany//esta relacion se llama topics
    {
        return $this->hasMany(Comentariostatu::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
        //y voy a acceder a ellos a travez de topics
        //topics va regresar todos lo temas relacionados a el subject

        public function liketats(): HasMany//esta relacion se llama topics
        {
            return $this->hasMany(Liketat::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
            //y voy a acceder a ellos a travez de topics
            //topics va regresar todos lo temas relacionados a el subject

            public function vivencias(): HasMany//esta relacion se llama topics
            {
                return $this->hasMany(Vivencia::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
                //y voy a acceder a ellos a travez de topics
                //topics va regresar todos lo temas relacionados a el subject

                public function comentariovivencias(): HasMany//esta relacion se llama topics
                {
                    return $this->hasMany(Comentariovivencia::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
                    //y voy a acceder a ellos a travez de topics
                    //topics va regresar todos lo temas relacionados a el subject


                    public function likevivencias(): HasMany//esta relacion se llama topics
        {
            return $this->hasMany(Likevivencia::class);}//retur de este modelo que apunta a topic class tiene muchos topicos
            //y voy a acceder a ellos a travez de topics
}