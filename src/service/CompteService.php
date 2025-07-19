<?php

namespace App\Src\Service;

use App\Src\Repository\CompteRepository;

class CompteService
{
    private CompteRepository $compteRepository;

    public function __construct()
    {
        $this->compteRepository = new CompteRepository();
    }

    public function getsolde($idutilisateur): mixed
    {
        return $this->compteRepository->getsoldebyUserId($idutilisateur);
    }
}
