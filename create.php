<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une catégorie de QCM</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Ajouter une catégorie de QCM</h1>

    <form action="create.php">
        <label>Identifiant </label><input type="text" name="shortname" size="10" />
        <label>Libellé </label><input type="text" name="longname" size="50" />
        <input type="submit" value="Créer" />
    </form>

    <?php
    if (isset($_GET['shortname']) && isset($_GET['longname'])) {
        $shortname = $_GET['shortname'];
        $longname = $_GET['longname'];

        $host = "localhost";
        $username = "slamquiz";
        $passwd = "sZzbN1bIdAGr7NrE";
        $dbname = "slamquiz";

        $idConnexion = new MySQLi($host, $username, $passwd, $dbname);
        if ($idConnexion) {
            
            $idConnexion->set_charset("utf8");

            $sql = "INSERT INTO tbl_category (shortname, longname) VALUES ('$shortname', '$longname')";
            $result = $idConnexion->query($sql);

            if ($result) { 
                print("Catégorie ajoutée");
            } else {
                print("Impossible d'exécuter la requête");
            }
            $idConnexion->close();
        } else {
            print("Impossible de se connecter");
        }
    }
    ?>


</body>

</html>