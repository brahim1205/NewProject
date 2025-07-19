

        <!-- Contenu principal -->
            <div  class="flex-1 p-6">
                <!-- En-tête -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
                    <p class="text-gray-600">Bienvenue, <?= htmlspecialchars($user->getPrenom() . ' ' . $user->getNom()) ?></p>
                </div>


                <!-- Navigation principale -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <button onclick="showSection('apercu')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                        <div class="text-center">
                            <i class="fas fa-home text-2xl text-orange-500 mb-2"></i>
                            <p class="font-medium text-gray-700">Aperçu</p>
                        </div>
                    </button>

                    <button onclick="showSection('transactions')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                        <div class="text-center">
                            <i class="fas fa-exchange-alt text-2xl text-orange-500 mb-2"></i>
                            <p class="font-medium text-gray-700">Transactions</p>
                        </div>
                    </button>

                    <button onclick="showSection('depot')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                        <div class="text-center">
                            <i class="fas fa-plus-circle text-2xl text-orange-500 mb-2"></i>
                            <p class="font-medium text-gray-700">Dépôt</p>
                        </div>
                    </button>

                    <button onclick="showSection('accounts')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                        <div class="text-center">
                            <i class="fas fa-university text-2xl text-orange-500 mb-2"></i>
                            <p class="font-medium text-gray-700">Mes comptes</p>
                        </div>
                    </button>
                </div>


                <!-- Section Aperçu -->
                <div id="apercu-section" class="section-content">
                    <!-- Statistiques -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Solde actuel</p>






                                    <p id="solde-display" class="text-2xl font-bold text-gray-900">
                                        <?= isset($compte['solde']) ? number_format($compte['solde'], 0, ',', ' ') . ' FCFA' : 'N/A' ?>
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-wallet text-orange-600"></i>
                                </div>
                            </div>
                            <button onclick="toggleSolde()" class="mt-2 text-sm text-orange-600 hover:text-orange-700">


                                <i id="eye-icon" class="fas fa-eye-slash"></i>
                                <span id="toggle-text">Masquer</span>
                            </button>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Transactions ce mois</p>
                                    <p class="text-2xl font-bold text-gray-900"><?= count($transactions) ?></p>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-exchange-alt text-blue-600"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Statut</p>
                                    <p class="text-2xl font-bold text-green-600">Actif</p>
                                </div>
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mon compte ET Dernières transactions sur la même ligne -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Informations du compte -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations du compte</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Numéro de compte:</span>
                                    <span class="font-medium"><?= isset($compte['numeroCompte']) ? htmlspecialchars($compte['numeroCompte']) : 'N/A' ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Type de compte:</span>
                                    <span class="font-medium">Compte courant</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Date d'ouverture:</span>
                                    <span class="font-medium">
                                        <?= isset($compte['dateCreation']) ? date('d/m/Y', strtotime($compte['dateCreation'])) : 'N/A' ?>
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Statut:</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Actif</span>
                                </div>
                            </div>
                        </div>

                        <!-- Dernières transactions -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Dernières transactions</h3>
                                <button onclick="showSection('transactions')" class="text-orange-600 hover:text-orange-700 text-sm">
                                    Voir tout
                                </button>
                            </div>
                            <div class="space-y-3">
                                <?php if (!empty($transactions)): ?>
                                    <?php foreach (array_slice($transactions, 0, 5) as $transaction): ?>
                                        <?php
                                        $isDeposit = strtoupper($transaction['type']) === 'DEPOT';
                                        $colorClass = $isDeposit ? 'green' : 'red';
                                        $iconClass = $isDeposit ? 'arrow-down' : 'arrow-up';
                                        $sign = $isDeposit ? '+' : '-';
                                        ?>
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                            <div class="flex items-center space-x-3">


                                                <div class="w-8 h-8 bg-<?= $colorClass ?>-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-<?= $iconClass ?> text-<?= $colorClass ?>-600 text-xs"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-900"><?= ucfirst(strtolower($transaction['type'])) ?></p>
                                                    <p class="text-xs text-gray-500"><?= date('d/m/Y H:i', strtotime($transaction['dateTransaction'])) ?></p>
                                                </div>
                                            </div>
                                            <div class="text-right">


                                                <p class="font-semibold text-<?= $colorClass ?>-600">
                                                    <?= $sign ?><?= number_format($transaction['montant'], 0, ',', ' ') ?> FCFA
                                                </p>
                                                <p class="text-xs text-gray-500"><?= ucfirst($transaction['statut']) ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="text-center py-8">
                                        <i class="fas fa-receipt text-3xl text-gray-300 mb-3"></i>
                                        <p class="text-gray-500">Aucune transaction récente</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Transactions -->
                <div id="transactions-section" class="section-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Historique des transactions</h3>
                        <div class="space-y-3">
                            <?php if (isset($transactions) && !empty($transactions)): ?>
                                <?php foreach ($transactions as $transaction): ?>
                                    <?php
                                    $isDeposit = strtoupper($transaction['type']) === 'DEPOT';
                                    $colorClass = $isDeposit ? 'green' : 'red';
                                    $sign = $isDeposit ? '+' : '-';
                                    ?>
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center space-x-3">


                                            <div class="w-12 h-12 bg-<?= $colorClass ?>-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-exchange-alt text-<?= $colorClass ?>-600"></i>
                                            </div>
                                            <div>


                                                <p class="font-medium text-gray-900"><?= htmlspecialchars($transaction['type']) ?></p>
                                                <p class="text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($transaction['dateTransaction'])) ?></p>
                                            </div>
                                        </div>


                                        <span class="font-semibold text-lg text-<?= $colorClass ?>-600">
                                            <?= $sign ?><?= number_format($transaction['montant'], 0, ',', ' ') ?> FCFA
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-gray-500 text-center py-8">Aucune transaction trouvée</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Section Dépôt -->
                <div id="depot-section" class="section-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Effectuer un dépôt</h3>
                        <p class="text-gray-600">Fonctionnalité de dépôt en cours de développement...</p>
                    </div>
                </div>

                <!-- Section Mes Comptes -->
                <div id="accounts-section" class="section-content hidden">
                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-900">Mes Comptes</h2>
                            <button onclick="showCreateAccountModal()" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                <i class="fas fa-plus mr-2"></i>Créer un compte secondaire
                            </button>
                        </div>

                        <!-- Liste des comptes -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php if (isset($comptes) && !empty($comptes)): ?>
                                <?php foreach ($comptes as $compte): ?>
                                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 <?= $compte['id'] == $compteActuel['id'] ? 'ring-2 ring-orange-500' : '' ?>">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    <?= $compte['type'] == 'PRINCIPAL' ? 'Compte Principal' : 'Compte Secondaire' ?>
                                                </h3>
                                                <p class="text-sm text-gray-600"><?= htmlspecialchars($compte['numeroCompte']) ?></p>
                                            </div>
                                            <?php if ($compte['id'] == $compteActuel['id']): ?>
                                                <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full">Actuel</span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="space-y-2 mb-4">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Solde:</span>
                                                <span class="font-semibold">
                                                    <?php if ($showSolde): ?>
                                                        <?= number_format($compte['solde'], 0, ',', ' ') ?> FCFA
                                                    <?php else: ?>
                                                        ****
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Créé le:</span>
                                                <span class="text-sm"><?= date('d/m/Y', strtotime($compte['dateCreation'])) ?></span>
                                            </div>
                                        </div>

                                        <?php if ($compte['id'] != $compteActuel['id']): ?>
                                            <button onclick="switchAccount(<?= $compte['id'] ?>)"
                                                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                                <i class="fas fa-exchange-alt mr-2"></i>Basculer vers ce compte
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-span-2 text-center py-8">
                                    <i class="fas fa-wallet text-4xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500">Aucun compte trouvé</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Modal Créer Compte Secondaire -->
                <div id="create-account-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-xl w-full max-w-md mx-4">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900">Créer un compte secondaire</h3>
                                <button onclick="closeCreateAccountModal()" class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form id="create-account-form" class="p-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="account-type" class="block text-sm font-medium text-gray-700 mb-2">Type de compte</label>
                                    <select id="account-type" name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                        <option value="EPARGNE">Compte Épargne</option>
                                        <option value="COURANT">Compte Courant</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="account-description" class="block text-sm font-medium text-gray-700 mb-2">Description (optionnel)</label>
                                    <input type="text" id="account-description" name="description"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        placeholder="Ex: Compte épargne vacances">
                                </div>
                            </div>
                            <div class="flex space-x-3 mt-6">
                                <button type="button" onclick="closeCreateAccountModal()"
                                    class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="flex-1 bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                    <i class="fas fa-plus mr-2"></i>Créer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
