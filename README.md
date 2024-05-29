# Projet GSB - Gestion des Visites

## Description du Projet

Ce projet est un exemple de site de gestion des visites médicales pour un laboratoire pharmaceutique. L'application permet aux visiteurs médicaux de gérer leurs visites auprès des praticiens, de suivre les médicaments présentés, et de tenir à jour les rapports de visite. Le projet a été entièrement développé en PHP, avec Tailwind CSS pour le design et SQL pour la gestion de la base de données.

## Contexte

### Activité à Gérer

L'activité commerciale d'un laboratoire pharmaceutique est principalement réalisée par les visiteurs médicaux. Les médicaments remboursés par la sécurité sociale ne sont jamais vendus directement au consommateur mais prescrits par les médecins. La promotion de ces produits est donc réalisée directement auprès des praticiens.

### Visiteurs Médicaux

Les visiteurs médicaux visitent régulièrement les médecins généralistes, spécialistes, les services hospitaliers, ainsi que les infirmiers et pharmaciens pour les informer sur les produits du laboratoire. Chaque visiteur dispose d'un portefeuille de praticiens, de sorte qu'un même médecin ne reçoit jamais deux visites différentes du même laboratoire.

## Fonctionnalités

### Gestion des Rapports de Visite

- **Création d'un nouveau rapport de visite** :
  1. Le visiteur demande à créer un nouveau rapport de visite.
  2. Le système retourne un formulaire avec la liste des médecins et des champs de saisie.
  3. Le visiteur sélectionne un médecin, la date de la visite, les médicaments présentés, et remplit les autres champs requis.
  4. Le système enregistre le rapport.

- **Modification d'un rapport de visite** :
  1. Le visiteur demande à modifier un rapport existant.
  2. Le système retourne un formulaire avec une date à sélectionner.
  3. Le visiteur sélectionne la date et choisit le rapport à modifier.
  4. Le visiteur modifie les informations et le système enregistre les modifications.

### Gestion des Médecins

- **Voir les informations d'un médecin** :
  1. Le visiteur demande à voir les informations concernant un médecin.
  2. Le système retourne un formulaire avec un champ de recherche.
  3. Le visiteur sélectionne un médecin et valide.
  4. Le système retourne les informations personnelles du médecin.

- **Envoyer un courriel à un médecin** :
  1. Le visiteur clique sur l’adresse de messagerie du médecin.
  2. Le système permet la rédaction et l’envoi d’un courriel.

- **Voir les rapports de visite d'un médecin** :
  1. Le visiteur demande à voir tous les anciens rapports de visite concernant un médecin.
  2. Le système retourne tous les rapports.

- **Modifier les informations d'un médecin** :
  1. Le visiteur demande à modifier certains champs concernant un médecin.
  2. Le système enregistre les modifications.

### Gestion des Produits

Les produits distribués par le laboratoire sont des médicaments. Chaque produit est identifié par un numéro de produit (dépôt légal) et a des effets thérapeutiques, des contre-indications, une composition spécifique, des interactions possibles avec d'autres médicaments, et des posologies dépendant de la présentation et du dosage.
