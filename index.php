<!DOCTYPE html>
<html>

<head>
    <title>Liste des catégories de QCM</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Liste des catégories de QCM</h1>

    <?php
    header('Content-Type: text/html; charset=utf-8');

    $host = "localhost";
    $username = "slamquiz";
    $passwd = "sZzbN1bIdAGr7NrE";
    $dbname = "slamquiz";

    print('<table border="1">');

    print('<tr>');
    print('<th>Id</th>');
    print('<th>Identifiant</th>');
    print('<th>Nom de la catégorie</th>');
    print('</tr>');


    $idConnexion = new \MySQLi($host, $username, $passwd, $dbname);
    if ($idConnexion) {

        $idConnexion->set_charset("utf8");

        $result = $idConnexion->query("SELECT * FROM tbl_category ;");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $shortname = $row['shortname'];
                $longname = $row['longname'];
                print('<tr>');
                print('<td>' . $id . '</td>');
                print('<td>' . $shortname . '</td>');
                print('<td>' . $longname . '</td>');
                print('</tr>');
            };
        } else {
            print("Impossible d'exécuter la requête");
        }
        $idConnexion->close();
    } else {
        print("Impossible de se connecter");
    }

    print('</table>');
    ?>

</body>

</html>