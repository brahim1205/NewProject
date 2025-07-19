<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MaxitSN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Créer un compte</h2>
                <p class="mt-2 text-gray-600">Rejoignez MaxitSN dès aujourd'hui</p>
            </div>

            <?php if (isset($errors['general'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <?= htmlspecialchars($errors['general']) ?>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="/inscription" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom *</label>
                        <input id="nom" name="nom" type="text"  
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                               value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
                        <?php if (isset($errors['nom'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['nom']) ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Prénom -->
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom *</label>
                        <input id="prenom" name="prenom" type="text"  
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                               value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
                        <?php if (isset($errors['prenom'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['prenom']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone *</label>
                    <input id="telephone" name="telephone" type="tel"  
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                           placeholder="771234567 ou +221771234567"
                           value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
                    <?php if (isset($errors['telephone'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['telephone']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Adresse -->
                <div>
                    <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse *</label>
                    <textarea id="adresse" name="adresse" rows="3"  
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"><?= htmlspecialchars($_POST['adresse'] ?? '') ?></textarea>
                    <?php if (isset($errors['adresse'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['adresse']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- CNI -->
                <div>
                    <label for="numero_piece_identite" class="block text-sm font-medium text-gray-700">Numéro CNI *</label>
                    <input id="numero_piece_identite" name="numero_piece_identite" type="text"  
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                           placeholder="1234567890123"
                           value="<?= htmlspecialchars($_POST['numero_piece_identite'] ?? '') ?>">
                    <?php if (isset($errors['numero_piece_identite'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['numero_piece_identite']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Mot de passe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe *</label>
                        <input id="password" name="password" type="password"  
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        <?php if (isset($errors['password'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['password']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe *</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"  
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        <?php if (isset($errors['password_confirmation'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['password_confirmation']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Photos -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Documents requis</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Photo de profil -->
                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo de profil *</label>
                            <input id="photo" name="photo" type="file" accept="image/*"  
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <?php if (isset($errors['photo'])): ?>
                                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['photo']) ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Photo recto CNI -->
                        <div>
                            <label for="photo_recto" class="block text-sm font-medium text-gray-700">CNI Recto *</label>
                            <input id="photo_recto" name="photo_recto" type="file" accept="image/*"  
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <?php if (isset($errors['photo_recto'])): ?>
                                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['photo_recto']) ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Photo verso CNI -->
                        <div>
                            <label for="photo_verso" class="block text-sm font-medium text-gray-700">CNI Verso *</label>
                            <input id="photo_verso" name="photo_verso" type="file" accept="image/*"  
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <?php if (isset($errors['photo_verso'])): ?>
                                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['photo_verso']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Créer mon compte
                    </button>
                </div>

                <!-- Lien de connexion -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Vous avez déjà un compte ?
                        <a href="/" class="font-medium text-orange-600 hover:text-orange-500">
                            Se connecter
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
