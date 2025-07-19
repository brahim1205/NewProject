<?php

namespace App\Src\Service;

use App\Src\Entity\User;
use App\Src\Repository\UserRepository;
use App\Core\Database;


class UserService
{
    private UserRepository $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository;
    }

    public function login($telephone): ?User
    {
        return $this->user_repository->selectByTelephone($telephone);
    }

    /**
     * Retourne la liste des transactions de l'utilisateur connecté
     * @param int|null $userId
     * @return array
     */
    public function getTransactions(?int $userId = null): array
    {
        // À adapter selon la logique réelle (ex: requête SQL, repository, etc.)
        // Ici, on retourne un tableau vide par défaut pour éviter l'erreur fatale
        return [];
    }
}
