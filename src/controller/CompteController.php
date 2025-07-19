<?php

namespace App\Src\Controller;

use  App\Src\Service\CompteService;

use App\Core\Abstract\AbstractController;

class CompteController extends AbstractController

{
     private CompteService $compteservice;
     public  function __construct()
     {
          $this->compteservice = new CompteService();
     }

     public function index(){}
     public function edit(){}
     public function destroy(){}
     public function store(){}
     public function show()
     {
          $this->renderHtml('dashboard/compte.html.php');
     }
     public function create(){}
     public function delete(){}
     public function login(){}
     public function register(){}
}
