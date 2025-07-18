<?php

namespace App\Services\User;

use App\Models\Capsule;

class CapsuleService
{
    static function getAllCapsules($id = null)
    {
        if (!$id) {
            return Capsule::all();
        }
        return Capsule::findorFail($id);
    }

    public static function createCapsule($data)
    {
        $capsule = new Capsule();

        $capsule->user_id       = $data['user_id'];
        $capsule->title         = $data['title'] ?? null;
        $capsule->message       = $data['message'] ?? null;
        $capsule->reveal_date   = $data['reveal_date'] ?? now()->addYear();
        $capsule->country       = $data['country'] ?? null;
        $capsule->mood          = $data['mood'] ?? null;
        $capsule->tag           = $data['tag'] ?? null;
        $capsule->privacy       = $data['privacy'] ?? 'private';
        $capsule->is_surprise   = $data['is_surprise'] ?? false;
        $capsule->is_activated  = $data['is_activated'] ?? false;

        $capsule->save();

        return $capsule;
    }
}
