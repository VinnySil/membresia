<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rol_id',
        'full_name',
        'nick',
        'nif',
        'email',
        'password',
        'born_date',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'nick';
    }

    public function rol(){return $this->belongsTo(Rol::class);}


    //local scopes
    public function scopeFilter($query, $filters){
        
        return $query
            ->when($filters['full_name'] ?? null, function ($query, $name){
                $query->where('full_name', 'like', "%$name%");
            })
            ->when($filters['nick'] ?? null, function ($query, $nick){
                $query->where('nick', 'like', "%$nick%");
            })
            ->when($filters['rol_id'] ?? null, function($query, $rol_id){
                $query->where('rol_id', $rol_id);
            });

    }
}
