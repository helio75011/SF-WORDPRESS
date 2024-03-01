# Projet SF

## Prérequis

Pour exécuter ce projet, vous aurez besoin des éléments suivants installés localement :

- Docker ((https://docs.docker.com/get-docker/))
- Docker Compose ((https://docs.docker.com/compose/install/))

## Configuration

Avant de lancer le projet, assurez-vous de configurer les variables d'environnement nécessaires. Copiez le fichier `.env.example` fourni dans ce dépôt vers un nouveau fichier nommé `.env` et remplissez-le avec vos propres valeurs :

```bash
cp .env.example .env
```

## Démarrage rapide

Pour démarrer le projet, suivez ces étapes :

1. Clonez ce dépôt sur votre machine locale :

```bash
git clone https://exemple.com/votre-projet.git
cd votre-projet
```

2. Lancez le projet en utilisant Docker Compose :

```bash
docker-compose up --build
```

Cette commande construira les images si nécessaire et démarrera les conteneurs définis dans votre fichier docker-compose.yml. Utilisez l'option -d pour les exécuter en arrière-plan.

### Utilisation

Une fois le projet lancé, vous pouvez accéder à l'application via votre navigateur en naviguant vers http://localhost:PORT, où PORT est le port spécifié dans votre fichier docker-compose.yml ou .env.

### Arrêter le projet
Pour arrêter et supprimer les conteneurs créés par docker-compose up, vous pouvez utiliser :

```bash
docker-compose down
```#   S F - W O R D P R E S S  
 