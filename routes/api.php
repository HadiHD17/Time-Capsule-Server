<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapsuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "v0.1"], function () {
    Route::get("/capsules", [CapsuleController::class, "GetAllCapsules"]);
    Route::get("/capsule/{id}", [CapsuleController::class, "GetCapsuleById"]);
    Route::post("/add_capsule", [CapsuleController::class, "AddCapsule"]);
    Route::post("/login", [AuthController::class, "Login"]);
    Route::post("/register", [AuthController::class, "Register"]);
});
