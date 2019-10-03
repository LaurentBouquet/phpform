<!DOCTYPE html>
<html>

<head>
    <title>Rechercher une catégorie de QCM</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>>Rechercher une catégorie de QCM</h1>

    <form action="search.php">
        <label>Identifiant </label><input type="text" name="shortname" size="10" />
    </form>
    <br />

    <div>
        <?php
        if (isset($_GET['shortname'])) {
            $id = -1;
            $shortname = $_GET['shortname'];
            $longname = "";

            $host = "localhost";
            $username = "slamquiz";
            $passwd = "sZzbN1bIdAGr7NrE";
            $dbname = "slamquiz";

            $idConnexion = new MySQLi($host, $username, $passwd, $dbname);
            if ($idConnexion) {

                $idConnexion->set_charset("utf8");

                $sql = "SELECT * FROM tbl_category WHERE shortname='" . $shortname . "';";
                print($sql);
                $result = $idConnexion->query($sql);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $shortname = $row['shortname']; //ou $_GET['shortname'];
                    $longname = $row['longname'];
                } else {
                    print("Impossible d'exécuter la requête");
                }
                $idConnexion->close();
            } else {
                print("Impossible de se connecter");
            }

            print('<table border="1">');

            print('<tr>');
            print('<th>Id</th>');
            print('<th>Identifiant</th>');
            print('<th>Nom de la catégorie</th>');
            print('</tr>');

            print('<tr>');
            print('<td>' . $id . '</td>');
            print('<td>' . $shortname . '</td>');
            print('<td>' . $longname . '</td>');
            print('</tr>');

            print('</table>');
        } else {
            print("Veuillez saisir l'identifiant de la catégorie.");
        }
        ?>
    </div>

</body>

</html>