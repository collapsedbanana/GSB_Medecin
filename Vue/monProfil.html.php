<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Profil de <?php print($_SESSION["login"])?></title>
    </head>
    <body class="bg-gradient-to-br from-blue-600 to-blue-400 h-screen">
        <h1 class="text-center text-3xl m-5"><strong>Profil de <?php print($_SESSION["login"])?></strong></h1>
        <div class="flex flex-row justify-center">
            <a class="text-center text-xl p-3 bg-gradient-to-l from-gray-400 to-gray-300 border-2 border-black hover:from-gray-300 hover:to-gray-200" href="./?action=nouveauRapport">Créer un nouveau rapport de visite</a>
        </div>
        <div class="flex flex-row justify-center">
            <a class="text-center text-xl p-3 bg-gradient-to-l from-gray-400 to-gray-300 border-2 border-black hover:from-gray-300 hover:to-gray-200" href="./?action=modifRapport">Modifier un rapport de visite</a>
        </div>
        <a class="bg-red-500 ml-3 hover:bg-red-600 border-[1px] rounded-lg border-red-800 p-3" href="./?action=deconnexion" id='Retour'>Deconnexion</a>
    </body>
</html>