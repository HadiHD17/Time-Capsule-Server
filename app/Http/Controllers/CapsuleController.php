<?php

namespace App\Http\Controllers;


use App\Services\User\CapsuleService;
use Illuminate\Http\Request;

class CapsuleController extends Controller
{
    function GetAllCapsules()
    {

        $capsules = CapsuleService::getAllCapsules();
        return $this->responseJSON($capsules);
    }

    public function GetPublicCapsules()
    {
        $capsules = CapsuleService::getPublicCapsules();
        return $this->responseJSON($capsules);
    }


    function GetCapsuleByUser(Request $request)
    {
        $capsules = CapsuleService::getCapsulesbyUser($request);
        return $this->responseJSON($capsules);
    }

    function GetCapsuleById($id)
    {
        $capsule = CapsuleService::getAllCapsules($id);
        return $this->responseJSON($capsule);
    }

    public function AddCapsule(Request $request)
    {
        $capsule = CapsuleService::createCapsule($request);
        return $this->responseJSON($capsule);
    }
}
