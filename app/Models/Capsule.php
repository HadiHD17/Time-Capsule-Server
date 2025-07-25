<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capsule extends Model
{
    /** @use HasFactory<\Database\Factories\CapsuleFactory> */
    use HasFactory;

    public function attachments()
    {
        return $this->hasMany(Attachement::class);
    }
}
