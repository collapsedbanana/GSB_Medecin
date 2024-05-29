<script>
    var visiteurs = <?php echo json_encode($VisiteursDAO); ?>;
    visiteurs.forEach(visiteur =>{
            console.log("visiteur login: "+visiteur["login"]+" visiteur mdp: "+visiteur["mdp"]);
    });

    function validerConnexion() {

        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var adresse = document.getElementById("adresse").value;
        var cp = document.getElementById("cp").value;
        var ville = document.getElementById("ville").value;
        var dateEmbauche = document.getElementById("dateEmbauche").value;
        var login = document.getElementById("login").value;
        var mdp = document.getElementById("mdp").value;
        var mdpVerif = document.getElementById("mdpVerif").value;

        var RegexNomPrenom = /^[a-zA-Z]+$/;
        var RegexAdresse = /^[a-zA-Z0-9\s,'-]*$/;
        var RegexCp = /^[0-9]{5}$/;
        var RegexVille = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
        var RegexLogin = /^[a-zA-Z0-9_]+$/;
        var RegexMdp = /^[a-zA-Z0-9!@#\$%\^&\*\(\)_\+{}\[\]:;<>,\.\?~\-=]+$/;

        if (nom == "" || prenom == "" || adresse == "" || cp == "" || ville == "" || dateEmbauche == "" || login == "" || mdp == "" || mdpVerif == "") {
            alert("Veuillez remplir tous les champs");
            return false;
        }

        if (nom.length < 2 || nom.length > 50) {
            alert("Le nom doit contenir entre 2 et 50 caractères");
            return false;
        }

        if (prenom.length < 2 || prenom.length > 50) {
            alert("Le prénom doit contenir entre 2 et 50 caractères");
            return false;
        }

        if (adresse.length < 2 || adresse.length > 50) {
            alert("L'adresse doit contenir entre 2 et 50 caractères");
            return false;
        }

        if (login.length < 2 || login.length > 20) {
            alert("Le login doit contenir entre 2 et 20 caractères");
            return false;
        }

        if (mdp.length < 4 || mdp.length > 20) {
            alert("Le mot de passe doit contenir entre 4 et 20 caractères");
            return false;
        }

        if (!RegexCp.test(cp)) {
            alert("Le code postal ne doit contenir que des chiffres");
            return false;
        }  

        if (cp.length != 5) {
            alert("Le code postal doit contenir 5 chiffres");
            return false;
        }

        if (ville.length < 2 || ville.length > 50) {
            alert("La ville doit contenir entre 2 et 50 caractères");
            return false;
        }

        if (login.indexOf(" ") != -1) {
            alert("Le login ne doit pas contenir d'espace");
            return false;
        }

        if (mdp.indexOf(" ") != -1) {
            alert("Le mot de passe ne doit pas contenir d'espace");
            return false;
        }

        if (mdp != mdpVerif) {
            alert("Les mots de passe ne correspondent pas");
            return false;
        }

        if (!RegexNomPrenom.test(nom)) {
            alert("Le nom ne doit contenir que des lettres");
            return false;
        }

        if (!RegexNomPrenom.test(prenom)) {
            alert("Le prénom ne doit contenir que des lettres");
            return false;
        }

        if (!RegexAdresse.test(adresse)) {
            alert("L'adresse ne doit contenir que des lettres, des chiffres et des caractères spéciaux autorisés");
            return false;
        }

        if (!RegexVille.test(ville)) {
            alert("La ville ne doit contenir que des lettres");
            return false;
        }

        if (!RegexLogin.test(login)) {
            alert("Le login ne doit contenir que des lettres, des chiffres et des caractères underscore (_)");
            return false;
        }

        if (!RegexMdp.test(mdp)) {
            alert("Le mot de passe ne doit contenir que des lettres, des chiffres et des caractères spéciaux autorisés");
            return false;
        }

        var loginExiste = false;
        for (var i = 0; i < visiteurs.length; i++) {
            var visiteur = visiteurs[i];
            if (visiteur["login"] === login) {
                loginExiste = true;
                break; 
            }
        }

        if (loginExiste) {
            alert("Le login existe déjà");
            return false;
        }

        return true;
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Inscription</title>
    </head>
    <body class="bg-gradient-to-br from-black to-gray-700 h-screen">
        <div class="flex flex-row justify-center absolute top-5 left-5">
            <a href="./?action=deconnexion" id='Retour' class="text-center text-white text-2xl hover:text-gray-200 hover:border-b-2 border-gray-200">Retour</a>
        </div>
        <div class="flex flex-row justify-center">
        
            <div class="border-2 border-white rounded-xl m-3 p-3 w-1/2">
                <h1 class="text-2xl text-white text-center">INSCRIPTION</h1>
                <form class="flex flex-col items-center" method="post" action="./?action=inscription" onsubmit="return validerConnexion();">
                    <input class="w-48 m-2 p-2" type="text" placeholder="Nom" name="nom" id="nom"/>
                    <input class="w-48 m-2 p-2" type="text" placeholder="Prénom" name="prenom" id="prenom"/>
                    <input class="w-48 m-2 p-2" type="text" placeholder="Adresse" name="adresse" id="adresse"/>
                    <input class="w-48 m-2 p-2" type="text" placeholder="Code Postal" name="cp" id="cp"/>
                    <input class="w-48 m-2 p-2" type="text" placeholder="Ville" name="ville" id="ville"/>
                    <input class="w-48 m-2 p-2" type="date" placeholder="Date d'embauche" name="dateEmbauche" id="dateEmbauche"/>
                    <input class="w-48 m-2 p-2" type="text" placeholder="Login" name="login" id="login"/>
                    <div class="relative">
                        <input class="w-48 m-2 p-2 pr-10" type="password" placeholder="Password" name="mdp" id="mdp"/>
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 p-2 outline-none">
                            <img id="toggleImage" alt="Afficher" src="Vue/img/oeil_barre.png" class="w-8 h-8 mr-2">
                        </button>
                    </div>
                    <div class="relative">
                        <input class="w-48 m-2 p-2 pr-10" type="password" placeholder="Password" name="mdpVerif" id="mdpVerif"/>
                        <button type="button" id="togglePasswordVerif" class="absolute inset-y-0 right-0 p-2 outline-none">
                            <img id="toggleImageVerif" alt="AfficherVerif" src="Vue/img/oeil_barre.png" class="w-8 h-8 mr-2">
                        </button>
                    </div>
                        <script>
                            // Sélectionnez la boîte de texte du mot de passe, le bouton "Afficher/Masquer" et l'image
                            var mdpInput = document.getElementById("mdp");
                            var togglePasswordButton = document.getElementById("togglePassword");
                            var toggleImage = document.getElementById("toggleImage");

                            // Écoutez l'événement clic sur le bouton "Afficher/Masquer"
                            togglePasswordButton.addEventListener("click", function () {
                                if (mdpInput.type === "password") {
                                    mdpInput.type = "text";
                                    toggleImage.src = "Vue/img/oeil.png"; // Image pour masquer le mot de passe
                                    toggleImage.alt = "Masquer";
                                } else {
                                    mdpInput.type = "password";
                                    toggleImage.src = "Vue/img/oeil_barre.png"; // Image pour afficher le mot de passe
                                    toggleImage.alt = "Afficher";
                                }
                            });

                            // Sélectionnez la boîte de texte du mot de passe, le bouton "Afficher/Masquer" et l'image
                            var mdpInputVerif = document.getElementById("mdpVerif");
                            var togglePasswordButtonVerif = document.getElementById("togglePasswordVerif");
                            var toggleImageVerif = document.getElementById("toggleImageVerif");

                            // Écoutez l'événement clic sur le bouton "Afficher/Masquer"
                            togglePasswordButtonVerif.addEventListener("click", function () {
                                if (mdpInputVerif.type === "password") {
                                    mdpInputVerif.type = "text";
                                    toggleImageVerif.src = "Vue/img/oeil.png"; // Image pour masquer le mot de passe
                                    toggleImageVerif.alt = "Masquer";
                                } else {
                                    mdpInputVerif.type = "password";
                                    toggleImageVerif.src = "Vue/img/oeil_barre.png"; // Image pour afficher le mot de passe
                                    toggleImageVerif.alt = "Afficher";
                                }
                            });
                        </script>
                    
                    <input class="text-white text-xl mt-4 border-[1px] border-white rounded-md bg-slate-700 hover:bg-slate-500 hover:cursor-pointer p-5" type="submit" value="S'inscrire"/>
                </form>
            </div>         
        </div>
        
    </body>
</html>