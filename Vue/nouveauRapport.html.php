<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Nouveau Rapport</title>
    </head>
    <body class="bg-gradient-to-br from-blue-600 to-blue-400 h-screen">
        <form method='post'>
            <h1 class="text-center text-3xl m-5"><strong>Nouveau Rapport</strong></h1>
            <div class="flex flex-row justify-center">
                <label for="dateVisite">Date de la visite</label>
                <input type="date" name="dateVisite" id="dateVisite">
            </div>
            <div class="flex flex-row justify-center">
                <label for="medecin">Médecin</label>
                <select name="medecin" id="medecin">
                    <?php
                        foreach($listeMedecins as $m){
                            print("<option value='".$m["id"]."'>".$m["nom"]." ".$m["prenom"]."</option>");
                        }
                    ?>
                </select>
            </div>
            <div class="flex flex-row justify-center">
                <label for="motif">Motif</label>
                <select name="motif" id="motif">
                    <option value="Consultation régulière">Consultation régulière</option>
                    <option value="Visite annuelle">Visite annuelle</option>
                    <option value="Alergies">Alergies</option>
                    <option value="Migraines">Migraines</option>
                    <option value="Toux persistante">Toux persistante</option>
                    <option value="Problème de peau">Problème de peau</option>
                    <option value="Douleurs aux genoux">Douleurs aux genoux</option>
                    <option value="Douleurs au dos">Douleurs au dos</option>
                </select>
            </div>
            <div class="flex flex-row justify-center">
                <label for="bilan">Bilan</label>
                <textarea name="bilan" id="bilan" cols="30" rows="10"></textarea>
            </div>
            <div class="flex flex-row justify-center ">
                <input class="border-black border-2 p-3 rounded-xl bg-green-600 hover:bg-green-500" type="submit" value="Valider">
            </div>
        </form>
        <a class="bg-red-500 ml-3 hover:bg-red-600 border-[1px] rounded-lg border-red-800 p-3" href="./?action=menuPrincipal">Retour</a>
    </body>
</html>