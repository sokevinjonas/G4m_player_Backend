# 🎮 G4M Player

**G4M Player** est une application mobile dédiée aux gamers, leur permettant de :

-   Découvrir les compétitions à venir sur leurs jeux préférés (PUBG, COD, Dream League, Clash of Clans, etc.)
-   S'inscrire aux tournois
-   Rejoindre des groupes ou communautés de joueurs
-   Suivre leur profil, statistiques, badges et classement

> Ce projet a été réalisé dans le cadre d’un défi personnel : **coder une application complète en 5h** avec la puissance de l’IA comme copilote.

---

## 🚀 Stack technique

-   **Frontend** : [Ionic Angular](https://ionicframework.com/)
-   **Backend** : [Laravel 11](https://laravel.com/)
-   **Base de données** : MySQL
-   **API Auth** : Laravel Sanctum
-   **Notifications & Realtime** _(à venir)_ : Firebase (optionnel)

---

## 📦 Fonctionnalités principales

### 🎯 Joueurs

-   Inscription, login sécurisé
-   Accès à leur profil public
-   Visualisation des jeux auxquels ils participent
-   Points cumulés et classement global

### 🏆 Compétitions

-   Liste des compétitions disponibles par jeu
-   Détails d’un tournoi
-   Inscription à un tournoi
-   Classement des participants

### 👥 Groupes

-   Liste des groupes par jeu
-   Rejoindre un groupe
-   Découverte de membres

### 🛡️ Authentification

-   Toutes les routes API sont protégées par une authentification JWT (via Sanctum), sauf :
    -   Inscription à un tournoi
    -   Consultation des compétitions
    -   Profil public d’un joueur

---

## 🔗 Endpoints API principaux

| Méthode | URL                               | Description                       |
| ------- | --------------------------------- | --------------------------------- |
| `GET`   | `/api/competitions`               | Liste des compétitions            |
| `GET`   | `/api/competitions/{id}`          | Détail d’une compétition          |
| `POST`  | `/api/competitions/{id}/register` | Inscription à un tournoi          |
| `GET`   | `/api/groups`                     | Liste des groupes                 |
| `POST`  | `/api/groups/{id}/join`           | Rejoindre un groupe               |
| `GET`   | `/api/profile`                    | Voir son profil                   |
| `GET`   | `/api/users/{id}`                 | Voir le profil public d’un joueur |

---
