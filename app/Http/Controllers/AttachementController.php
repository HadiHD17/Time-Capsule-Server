<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Attachement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AttachementController extends Controller
{
    public function GetAttachment(Request $request, $id)
    {
        $attachment = Attachement::findOrFail($id);

        // Use the Storage facade for the 'public' disk
        $path = Storage::disk('public')->path($attachment->file_url);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
