<?php

use App\Src\Controller\SecurityController;
use App\Src\Controller\AcceuilController;
use App\Src\Controller\BaseController;
use App\Src\Controller\CommercialController;
use App\Src\Controller\PayementController;
use App\Src\Controller\TransactionController;
use App\Src\Controller\CompteController;



return [
    "" => 
    [
        'controller' => SecurityController::class, 
        'method' => 'login'
    ],

    "register" => 
    [
        'controller' => SecurityController::class, 
        'method' => 'register'
    ],

    "dashbordClient" => 
    [
        'controller' => AcceuilController::class, 
        'method' => 'index'
    ],

    "dashbordCommercial"=>
    [
        'controller'=>CommercialController::class, 
        'method' => 'edit'
    ],

      "acceuil"=>
    [
        'controller'=>BaseController::class, 
        'method' => 'show'
    ],

      "payement"=>
    [
        'controller'=>PayementController::class, 
        'method' => 'store'
    ],

        "transaction"=>
    [
        'controller'=>TransactionController::class, 
        'method' => 'store'
    ],

         "transaction"=>
    [
        'controller'=>CompteController::class, 
        'method' => 'show'
    ],

            "acceuil"=>
    [
        'controller'=>SecurityController::class, 
        'method' => 'acceuil'
    ],

];
