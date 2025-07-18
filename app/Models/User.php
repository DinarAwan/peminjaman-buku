<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Message;
use App\Models\Komentar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'name',
        'email',
        'password',
        'role',
        'alamat',
        'foto_profile',
        'foto_bacground',
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

    public function bukuDipinjam(){
        return $this->belongsToMany(Buku::class, 'peminjaman', 'user_id', 'buku_id')
                    ->withPivot('tanggal_pinjam', 'tanggal_kembali', 'status')
                    ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function komentars(){
        return $this->hasMany(Komentar::class);
    }
}
