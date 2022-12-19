<?php
session_start();
include 'php/master.php';
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>MATHIS CODE</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="css/monsite.css">
		<link rel="stylesheet" href="css/font_import.css">
        <script src="js/js.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
	<body>
		<header id="header_id">
			<ul id="menu">
				<?php
                echo '<li><a href="#background1" id="titre_barmenu">'.$barmenu["titre"].'</a></li>';
                ?>
                <li id="aligne_droite_barmenu">
                    <details><summary><img src="img/3_lignes.png" alt="logo 3 lignes" id="img_barmenu"></summary>
                <?php
                foreach($barmenu["text_barmenu"] AS $index=>$titre){
                    echo '<a href="#background'.(1 + $index).'">'.$titre.'</a>';
                }
                ?>
                    </details>
			</ul>
			<hr>
		</header>
		
		<main>
			<div id="background1">
			<div id="numero_1">
                <p class="numeros_alignes_droite">1</p>
				<?php
                echo '<h1>'.$background1["titre_principal"].'</h1>';
                echo '<p id="citation">'.$background1["citation"].'</p>';
                ?>
				<div id="logo_aligne">
                    <?php
                    foreach($background1["logos"] AS $logo){
                        echo '<a href="'. $logo["link"] .'"><img src="' . $logo["src"] . '" alt="' . $logo["alt"] . '"></a>';
                    }
                    echo '<p id="boite_nouveaute"><img src="'.$background1["nouveaute_img"].'" alt="icon feuille"><span class="titre_des_boites">Nouveautés</span>'.$background1["nouveaute"].'</p>';
                    ?>
				</div>
			</div>
			</div>
			
			<div id="background2">
			<div id="numero_2">
                <p class="numeros_alignes_gauche">2</p>
                <?php
                echo '<h2 class="titre_gauche reveal fade-left">'.$background2["titre"].'</h2>';
                foreach ($background2["boites"] AS $contenu){
                    echo '<p class="boite_a_propos reveal fade-bottom"><img src="'.$contenu["img_boite"].'" alt="icon feuille"><span class="titre_des_boites">'.$contenu["titre_boite"].'</span><br>'.$contenu["texte_boite"].'</p>';
                }
                ?>
			</div>
			</div>

            <div id="background3">
                <div id="numero_3">
                    <p class="numeros_alignes_droite">3</p>
                    <?php
                    echo '<h2 class="titre_droite reveal fade-right">'.$background3["titre"].'</h2>';

                    foreach($background3["progress"] AS $index=>$valeur){
                        if ($index == 2 or $index == 3){
                            echo '<div class="barre_competence"><div id="barre_'.$valeur["nom"].'" class="barre_competence_background_global reveal fade-left-bar"></div><div id="barre_'.$valeur["nom"].'_background" class="barre_competence_global"><div class="projets_droite"><p>'.$valeur["barre_nom"].'</p></div></div></div>';
                        }else{
                            echo '<div class="barre_competence"><div id="barre_'.$valeur["nom"].'_background" class="barre_competence_background_global"><div class="projets_gauche"><p>'.$valeur["barre_nom"].'</p></div></div><div id="barre_'.$valeur["nom"].'" class="barre_competence_global reveal fade-right-bar"></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>
			
			<div id="background4">
			<div id="numero_4">
                <p class="numeros_alignes_gauche">4</p>
				<?php
				echo '<h2 class="titre_gauche reveal fade-left">'.$background4["titre"].'</h2>';

                foreach($background4["images"] AS $valeur){
                    echo '<div class="boite_travaux reveal fade-bottom"><img src="'.$valeur["src"].'" alt="'.$valeur["alt"].'"><p>'.$valeur["texte"].'</p></div>';
                }
                ?>
                <form action="voir_tout.php">
                    <button id="bouton_voir_tout" class="reveal fade-bottom">VOIR TOUT</button>
                </form>
			</div>
			</div>

			<div id="background5">
			<div id="numero_5">
                <p class="numeros_alignes_droite">5</p>
				<?php
                echo '<h2 class="titre_droite reveal fade-right">'.$background5["titre"].'</h2>';
                ?>
                <div id="#formation">
                    <?php
                    echo '<img id="photo_gauche_formation" src="'.$background5["img"].'" alt="'.$background5["img_alt"].'">';
                    ?>
                    <p class="cadre_formation">test</p>
                    <p class="cadre_formation">test</p>
                    <p class="cadre_formation">test</p>
                </div>
			</div>
			</div>
			
			<div id="background6">
				<hr id="separation_contact">
                <?php
                echo '<h2 class="titre_gauche reveal fade-left">'.$background6["titre"].'</h2>';
                ?>
                <div id="cadre_global_formulaire">
                    <form name="envoi_mail" action="php/envoi_mail.php" method="post">
                        <?php
                        foreach ($background6["zone_texte"] as $chaque_zone){
                            echo '<p>'.$chaque_zone["pre_texte"].'<br>'.$chaque_zone['balise'].'</p>';
                        }
                        ?>
                        <p>
                        <?php
                        echo '<span class="g-recaptcha" data-sitekey="'.$secret_data["site_key"].'"></span>';
                        if (isset($_SESSION["formulaire_resultat"])){
                            echo '<span id="erreur_message_captcha">'.$_SESSION["formulaire_resultat"].'</span>';
                        }
                        ?>
                            <span id="boutton_align_form">
                                <input class="envoyer_annuler" type="submit" value="Envoyer">
                                <input class="envoyer_annuler" type="reset" value="Annuler">
                            </span>
                    </form>
                </div>
			</div>
	
		</main>
		<footer>
            <div class="footer_boite_align">
                <?php
                foreach($footer["text_footer"] AS $colonne){
                    echo '<div class="footer_boite">';
                    foreach($colonne AS $valeur){
                        echo $valeur;
                    }
                    echo '</div>';
                }
                ?>
            </div>
            <hr>
			<?php
			echo '<p>'.$footer["copyright"].'</p>';
			?>
		</footer>
	</body>
</html>