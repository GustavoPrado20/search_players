<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'tipo_usuario',
        'data_nascimento',
        'foto',
        'sexo',
        'sobre',
        'site',
        'esporte',
        'banner',
        'preco',
        'pontos',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //RELAÇÔES ENTRE MODELOS

    //Relação com a model endereco
    public function endereco(){
        return $this->hasOne(related: endereco::class, foreignKey: 'id_usuario', localKey: 'id');
    }

    //relação com a model sugestao
    public function sugestao(){
        return $this->hasMany(related: sugestao::class, foreignKey: 'id_usuario', localKey: 'id');
    }

    //Relação com a model partida
    public function partida(){
        return $this->hasMany(related: partida::class, foreignKey: 'id_analisador', localKey: 'id');
    }

    //Relação com a model notificacao
    public function notificacao(){
        return $this->hasMany(related: notificacao::class, foreignKey: ['id_usuario_1', 'id_usuario_2'], localKey: 'id');
    }

    //Relação com a model jogadores_times
    public function jogadores_time(){
        return $this->hasMany(related: jogadores_time::class, foreignKey: 'id_jogador', localKey: 'id');
    }

    //relação com a model feedback_saida
    public function feedbck_saida(){
        return $this->hasOne(related: feedbck_saida::class, foreignKey: 'id_usuario', localKey: 'id');
    }

    //relacao com a model contrato
    public function contrato(){
        return $this->hasMany(related: contrato::class, foreignKey: ['id_jogador', 'id_contratante'], localKey: 'id');
    }

    //relacao com a model chat_time
    public function chat_time(){
        return $this->hasMany(related: chat_time::class, foreignKey: 'id_usuario', localKey: 'id');
    }

    //relacao com a model chat
    public function chat(){
        return $this->hasMany(related: chat::class, foreignKey: ['id_usuario', 'id_destino'], localKey: 'id');
    }

    //relacao com a model campeonato
    public function campeonato(){
        return $this->hasMany(related: campeonato::class, foreignKey: 'id_organisador', localKey: 'id');
    }
}
