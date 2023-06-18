<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKematian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'tanggal_meninggal',
        'no_kk',
        'nik',
        'gender',
        'umur',
        'tempat_meninggal',
        'sebab_meninggal',
        'status',
        'scan_ktp',
    ];

    public function scopeFilter($query, Array $filters){
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->whereHas('user', function ($query) use ($search){
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nik', 'like', '%' . $search . '%');
            });
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
