<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use App\Http\Requests\StoreCapsuleRequest;
use App\Http\Requests\UpdateCapsuleRequest;
use App\Services\User\CapsuleService;
use Illuminate\Http\Request;

class CapsuleController extends Controller
{
    function GetAllCapsules()
    {
        $capsules = CapsuleService::getAllCapsules();
        return $this->responseJSON($capsules);
    }

    function GetCapsuleById($id)
    {
        $capsule = CapsuleService::getAllCapsules($id);
        return $this->responseJSON($capsule);
    }

    function AddCapsule(Request $request)
    {
        $capsule = CapsuleService::createCapsule($request);
        return $this->responseJSON($capsule);
    }
}
