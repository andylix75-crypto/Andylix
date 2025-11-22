# Andylix
App pour freelanceurs

## Structure du Projet

```
Andylix/
├── backend/                    # Serveur backend
│   ├── src/
│   │   ├── controllers/       # Contrôleurs pour gérer les requêtes
│   │   ├── models/            # Modèles de données
│   │   ├── routes/            # Routes API
│   │   ├── services/          # Logique métier
│   │   ├── middleware/        # Middleware (auth, validation, etc.)
│   │   ├── utils/             # Fonctions utilitaires
│   │   └── config/            # Configuration de l'application
│   ├── tests/                 # Tests unitaires et d'intégration
│   ├── package.json           # Dépendances Node.js
│   └── README.md              # Documentation backend
│
├── frontend/                   # Application frontend
│   ├── src/
│   │   ├── components/        # Composants réutilisables
│   │   ├── pages/             # Pages de l'application
│   │   ├── services/          # Services API
│   │   ├── hooks/             # Custom hooks React
│   │   ├── context/           # Context API pour l'état global
│   │   ├── utils/             # Fonctions utilitaires
│   │   ├── assets/            # Images, icônes, etc.
│   │   └── styles/            # Styles globaux
│   ├── public/                # Fichiers statiques
│   ├── tests/                 # Tests frontend
│   ├── package.json           # Dépendances frontend
│   └── README.md              # Documentation frontend
│
├── mobile/                     # Application mobile (optionnel)
│   ├── ios/                   # Code spécifique iOS
│   ├── android/               # Code spécifique Android
│   └── src/                   # Code partagé
│
├── docs/                       # Documentation du projet
│   ├── api/                   # Documentation API
│   ├── architecture/          # Documentation architecture
│   └── guides/                # Guides d'utilisation
│
├── scripts/                    # Scripts utilitaires
│   ├── deploy.sh              # Script de déploiement
│   ├── setup.sh               # Script d'installation
│   └── test.sh                # Script de test
│
├── .github/                    # Configuration GitHub
│   └── workflows/             # GitHub Actions CI/CD
│
├── docker/                     # Fichiers Docker
│   ├── Dockerfile.backend
│   ├── Dockerfile.frontend
│   └── docker-compose.yml
│
├── .gitignore                 # Fichiers ignorés par Git
├── README.md                  # Ce fichier
└── LICENSE                    # Licence du projet
```

## Description des Modules

### Backend
Le backend est responsable de :
- Gestion des utilisateurs (freelancers et clients)
- Authentification et autorisation
- Gestion des projets et missions
- Système de paiement
- API REST pour le frontend

### Frontend
Le frontend fournit :
- Interface utilisateur pour les freelancers
- Interface utilisateur pour les clients
- Tableau de bord pour gérer les projets
- Système de messagerie
- Profils utilisateurs

### Documentation
La documentation inclut :
- Documentation API (endpoints, authentification, etc.)
- Guide d'architecture du système
- Guides d'utilisation pour développeurs

## Technologies Envisagées

### Backend
- Node.js avec Express ou NestJS
- Base de données : PostgreSQL ou MongoDB
- Authentication : JWT
- API : REST ou GraphQL

### Frontend
- React ou Vue.js
- État global : Redux ou Context API
- UI : Material-UI ou Tailwind CSS

### DevOps
- Docker pour la containerisation
- GitHub Actions pour CI/CD
- AWS, GCP ou Heroku pour l'hébergement
