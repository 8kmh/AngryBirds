# Listes des routes pour Angry Birds

- nom: home
    - path: /
    - controller : MainController::index()
    - Affiche la page principale, la liste de tous les oiseaux

- nom: bird_single
    - path: /bird/{id}
    - controller : MainController::birdSingle()
    - Affiche les informations d'un seul oiseau

- nom: calendar
    - path: /download/calendar
    - controller : MainController::calendarDownload()

