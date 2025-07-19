<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use App\Http\Requests\StoreAttachementRequest;
use App\Http\Requests\UpdateAttachementRequest;

class AttachementController extends Controller
{
    public function GetAttachment($id)
    {
        $attachment = Attachement::findOrFail($id);
        $path = storage_path('app/' . $attachment->file_url);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
