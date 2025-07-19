<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;
use App\Src\Service\UserService;

class SecurityController extends AbstractController
{
   private UserService $user_service;

   public function __construct()
   {
      $this->user_service = new UserService;
   }

   public function index() {}
   public function edit() {}
   public function destroy() {}
   public function store() {}
   public function show() {}
   public function create() {}
   public function delete() {}


   public function login()
   {
      require_once '../template/security/login.html.php';
   }

   public function register()
   {
      require_once '../template/security/inscription.html.php';
   }
   public function acceuil()
   {
      session_start();

      $tel = $_POST['telephone'];


      $user = $this->user_service->login($tel);




      $_SESSION["user"] = $user;

      if ($user) {


         $transactions = $this->user_service->getTransactions($user->getId() ?? null);
         














         // Essayer de récupérer le compte - si la méthode n'existe pas, créer des données par défaut
         $compte = null;
         
         // Vérifier si la méthode existe
         if (method_exists($this->user_service, 'getCompteByUserId')) {
            $compte = $this->user_service->getCompteByUserId($user->getId());
         }
         
         // Si pas de compte trouvé, créer des données par défaut
         if (!$compte) {
            $compte = [


                'id' => $user->getId(),
                'solde' => 50000, // Remplacer par la vraie valeur de la DB
                'type' => 'PRINCIPAL',

                'numeroCompte' => 'CPT' . str_pad($user->getId(), 6, '0', STR_PAD_LEFT)
            ];

        }

         $this->renderHtml('dashboard/ClientDashboard.html.php', [
            'user' => $user,
            'transactions' => $transactions,
            'compte' => $compte,
            'compteActuel' => $compte,
            'showSolde' => true
         ]);
      } else {

         require_once '../template/security/login.html.php';
      }
   }
}
