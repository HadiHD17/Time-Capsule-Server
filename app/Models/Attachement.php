<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    protected $fillable = ['capsule_id', 'file_url', 'file_type'];
    /** @use HasFactory<\Database\Factories\AttachementFactory> */
    use HasFactory;
    public function capsule()
    {
        return $this->belongsTo(Capsule::class, 'capsule_id');
    }
}
