# TechStorm Project

Bienvenue dans le projet TechStorm, notre thème WordPress pour le TP3 ! Ce README explique comment configurer l'environnement, contribuer au code, et collaborer via GitHub.

## Informations générales
- **Date** : 24 octobre 2025
- **Objectif** : Développer un thème e-commerce avec WooCommerce.

## Prérequis
- **Logiciels** :
  - [Git](https://git-scm.com/downloads) (pour clonage et commits).
  - [Local by Flywheel](https://localwp.com) (pour l'environnement WordPress local).
  - Un éditeur de code (VS Code ou autre).
- **Compte GitHub** : Créez un compte et demandez au porpiétaire du dépôt de vous ajouter comme collaborateur.

## Configuration de l'environnement
1. **Installation de Local by Flywheel** :
   - Téléchargez et installez Local WP.
   - Créez un nouveau site local (nom : `techstorm-local`, port par défaut).
2. **Clonage du dépôt** :
   - Ouvre un terminal et exécute :
       - git clone https://github.com/votre-utilisateur/TechStorm-Project.git
       - cd TechStorm-Project

3. **Importation du thème** :
- Copie le dossier `techstorm` dans `wp-content/themes/` de ton site Local.
- Active le thème dans **Apparence > Thèmes** dans l'admin WordPress.
4. **Installation de WooCommerce** :
- Dans l'admin WP, va à **Extensions > Ajouter**, recherche "WooCommerce", installe et active-le.
- Configure les bases (devise : FCFA, pas de paiement réel pour test).
5. **Optionnel - Importation de la DB** :
- Si fourni, importe le fichier `.sql` via phpMyAdmin (dans Local > Site > Database).
- Sinon, ajoute manuellement des produits dans **Produits > Ajouter**.

## Collaboration via GitHub
- **Branchements** :
- Crée une branche pour ton travail : `git checkout -b ton-nom/tache` (ex. `jean/produits`).
- Travaille sur cette branche.
- **Commits et Push** :
- Ajoute tes changements : `git add .`
- Commit : `git commit -m "Description de la modif"`
- Pousse : `git push origin ton-nom/tache`
- **Pull Requests (PR)** :
- Crée une PR sur GitHub pour fusionner ta branche dans `main`.
- Demande une revue à un camarade avant fusion.
- **Mise à jour** :
- Tire les dernières modifications : `git pull origin main` avant de commencer.


## Accès au site partagé
- **Option Flywheel (recommandé)** :
- Le site est pushé sur Flywheel : [URL, ex. techstorm-dev.flywheelsites.com].
- Tu recevras un email d'invitation pour accéder à l'admin et tester WooCommerce.
- **Local uniquement** : Si pas de Flywheel, partage ton export (zip + .sql) via le dépôt.

## Bonnes pratiques
- Teste localement avant push.
- Commente ton code (ex. dans PHP/CSS/JS).
- Signale les bugs sur GitHub Issues.
- Sauvegarde localement avant toute modif.

## Contact
- Questions : Ouvre une Issue sur GitHub.

Bonne collaboration, équipe TechStorm !
   
