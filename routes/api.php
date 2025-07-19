<?php

use App\Http\Controllers\AttachementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapsuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "v0.1"], function () {

    Route::group(["middleware" => "auth:api"], function () {
        Route::get("/capsule/{id}", [CapsuleController::class, "GetCapsuleById"]);
        Route::get("/capsules/user", [CapsuleController::class, "GetCapsuleByUser"]);
        Route::post("/add_capsule", [CapsuleController::class, "AddCapsule"]);
        Route::get("/capsules/public", [CapsuleController::class, "GetPublicCapsules"]);
        Route::get("/attachments/{id}", [AttachementController::class, "GetAttachment"]);
    });
    Route::group(["prefix" => "guest"], function () {
        Route::post("/login", [AuthController::class, "Login"]);
        Route::post("/register", [AuthController::class, "Register"]);
    });
});
