<?php

namespace App\Services\User;

use App\Models\Attachement;
use App\Models\Capsule;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CapsuleService
{
    static function getAllCapsules($id = null)
    {
        if (!$id) {
            return Capsule::all();
        }
        return Capsule::findorFail($id);
    }

    static function getPublicCapsules()
    {
        return Capsule::where('privacy', 'public')
            ->where('is_activated', true)
            ->get();
    }

    static function getCapsulesbyUser(Request $request)
    {
        $user = $request->user();
        $capsules = Capsule::where('user_id', $user->id)->get();
        return $capsules;
    }

    public static function createCapsule(Request $request)
    {
        $user = $request->user();
        $data = $request->all();

        $ip = $data['user_ip'] ?? $request->ip();

        $position = Location::get($ip);
        $countryName = $position ? $position->countryName : null;

        $capsule = new Capsule();

        $capsule->user_id       = $user->id;
        $capsule->title         = $data['title'] ?? null;
        $capsule->message       = $data['message'] ?? null;
        $capsule->reveal_date   = $data['reveal_date'] ?? now()->addYear();
        $capsule->country       = $countryName;
        $capsule->mood          = $data['mood'] ?? null;
        $capsule->tag           = $data['tag'] ?? null;
        $capsule->privacy       = $data['privacy'] ?? 'private';
        $capsule->is_surprise   = $data['is_surprise'] ?? false;
        $capsule->is_activated  = $data['is_activated'] ?? false;

        $capsule->save();

        if ($request->hasFile('attachment_file')) {
            $file = $request->file('attachment_file');
            $path = $file->store('attachments');
            $attachment = new Attachement();
            $attachment->file_url = $path;
            $attachment->file_type = $file->getClientMimeType();
            $capsule->attachements()->save($attachment);
        }

        return $capsule;
    }
}
