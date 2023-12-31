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
        'name',
        'email',
        'password',
        'role',
        'username',
        'no_kk',
        'nik',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'no_hp',
        'jabatan',
        'foto'
    ];


    public function scopeFilter($query, array $searchTerm){
        $query->when($searchTerm['search'] ?? false, fn($query, $search) => $query
        ->where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('username', 'LIKE', '%' . $search . '%')
        ->orWhere('email', 'LIKE' , '%'. $search . '%'));
    }


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

    public function sktm(){
        return $this->hasMany(SKTM::class);
    }

    public function pengantar_ktp(){
        return $this->hasMany(PengangarKTP::class);
    }

    public function surat_kematian(){
        return $this->hasMany(SuratKematian::class);
    }
}
