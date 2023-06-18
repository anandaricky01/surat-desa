<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengantarKTP extends Model
{
    use HasFactory;

    protected $table = 'pengantar_k_t_p_s';

    protected $fillable = [
        'user_id',
        'status',
        'scan_kk',
        'keterangan',
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
