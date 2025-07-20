<?php

namespace App\Services\User;

use App\Models\Attachement;
use App\Models\Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Log;

class CapsuleService
{
    static function getAllCapsules($id = null)
    {
        if (!$id) {
            return Capsule::with('attachments')->get();
        }
        return Capsule::with('attachments')->findOrFail($id);
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

        if ($request->has('attachments')) {
            $attachments = $request->input('attachments');

            foreach ($attachments as $base64File) {
                if (preg_match('/^data:(.*?);base64,(.*)$/', $base64File, $matches)) {
                    $mimeType = $matches[1];
                    $data = base64_decode($matches[2]);

                    $extension = explode('/', $mimeType)[1] ?? 'bin';
                    $filename = uniqid('', true) . '.' . $extension;
                    $path = 'attachments/' . $filename;

                    Storage::disk('public')->put($path, $data);


                    $attachment = new Attachement();
                    $attachment->capsule_id = $capsule->id;
                    $attachment->file_url = $path;
                    $attachment->file_type = $mimeType;
                    $attachment->save();
                }
            }
        }

        return response()->json([
            'message' => 'Capsule created successfully',
            'capsule' => $capsule->load('attachments'),
        ]);
    }
}
