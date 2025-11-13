# 🌐 Mon CMS Simple

Un système de boutique en ligne (CMS) léger et simple développé en PHP.

## 📋 Fonctionnalités

- ✅ Authentification des utilisateurs



## 🛠️ Technologies

- PHP 7.4+
- MySQL 5.7+
- HTML/CSS/JavaScript

## 📦 Installation

### Prérequis

- Serveur web (Apache/Nginx)
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur

### Étapes d'installation

1. Cloner le repository
```bash
git clone https://github.com/ing-Billnelson/techstorm-cms.git
cd techstorm-cms
```

2. Créer la base de données
```bash
mysql -u root -p
CREATE DATABASE techstorm_cms;
USE techstrom_cms;
SOURCE database.sql;
EXIT;
```

3. Configurer la connexion
```bash
cp config.example.php config.php
nano config.php
# Modifiez les paramètres de connexion
```

4. Configurer les permissions
```bash
chmod 777 uploads/
chmod 777 cache/
```

5. Accéder au CMS
```
http://localhost/techstorm-cms
```

⚠️ **Changez ces identifiants immédiatement après l'installation !**

## 📁 Structure de la branche
```
techstorm-cms/
├── config.php              # Configuration (non versionné)
├── config.example.php      # Exemple de configuration
├

├── login.php               # Authentification

├── logout.php              # Déconnexion
├── uploads/                # Fichiers uploadés (non versionné)
├── cache/                  # Cache (non versionné)
└── README.md               # Documentation
```
## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une issue ou un pull request.


## 👤 Auteur

DEMANOU BILL - [@ing-Billnelson](https://github.com/ing-Billnelson)
