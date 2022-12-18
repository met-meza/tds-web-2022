<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Un site</title>
</head>
<body bgcolor="#d3d3d3">
    <?php
    function fichier_en_invisible($files, $fichier_invisible){
        foreach ($fichier_invisible as $chaque_fichier_invisible){
            foreach (array_keys($files, $chaque_fichier_invisible) as $key) {
                unset($files[$key]);
            }
        }
        return $files;
    }

    function getDirContents($dir, $fichier_invisible, &$results = array()) {
        $files = scandir($dir);

        $files = fichier_en_invisible($files, $fichier_invisible); //function to remove specific name files or directory easily from $results

        foreach ($files as $key => $value) {
            $path = ($dir . "/" . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                getDirContents($path, $fichier_invisible, $results);
                $results[] = $path;
            }
        }
        return $results;
    }

    $fichier_invisible = [".git",".idea"];
    $fichier = array_reverse((getDirContents('../tds-web-2022', $fichier_invisible)));

    $random_color = [];
    function rand_color() {
        return sprintf('#%06X', mt_rand(0x222222, 0xDDDDDD));
    }

    $log_dernier_slash = 1;

    foreach ($fichier as $chaque_fichier){
        $nombre_de_slash = substr_count($chaque_fichier,"/")-1;

        //calcul couleur
        if ($nombre_de_slash > count($random_color)){
            $random_color[] = rand_color();
        }

        //calcul décalage
        if ($nombre_de_slash < $log_dernier_slash){
            for ($i = 1; $i <= $log_dernier_slash - $nombre_de_slash; $i++){
                echo "</ul></details>";
            }
        }

        if (is_dir($chaque_fichier)){
            echo "<details><summary>";
            echo "<div style='display:inline-flex'><img src='index_img/dir.png' alt='directory png' style='margin: auto 5px; width: 30px; height: 30px'><p style='color:".$random_color[$nombre_de_slash-1]."; font-weight: bold'>".substr($chaque_fichier, 16)."</p></div>";
            echo "</summary><ul>";
        }else{
            echo "<li>";
            echo "<div style='display:inline-flex; margin-left: 9px'><img src='index_img/file.png' alt='file png' style='margin: auto 5px; width: 30px; height: 30px'><p><a href='".substr($chaque_fichier, 16)."' style='text-decoration:none; color:black'>".substr($chaque_fichier, 16)."</a></p></div>";
            echo "</li>";
        }
        $log_dernier_slash = $nombre_de_slash;
    }
    ?>
</body>
</html>