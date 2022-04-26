<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php

    $rendben = true;

    $re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
    {
        echo "E-mail: " . $_POST['email'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "E-mail: " . $_POST['email'] . " Helyes". "<br>";
    }

	if(!isset($_POST['nev']) || strlen($_POST['nev']) < 8 || strlen($_POST['nev']) > 30)
	{
        echo "Név: " . $_POST['nev'] . " Hibás!". "<br>";
        $rendben = false;
	} else {
        echo "Név: " . $_POST['nev'] . " Helyes". "<br>";
    }

	if(!isset($_POST['pwd']) || strlen($_POST['pwd']) < 6 || strlen($_POST['pwd']) > 12)
	{
        echo "Jelszó: " . $_POST['pwd'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "Jelszó: " . $_POST['pwd'] . " Helyes". "<br>";
	}

    if(!isset($_POST['kor']) || intval($_POST['kor']) < 18 || intval($_POST['kor']) > 100)
    {
        echo "Kor: " . $_POST['kor'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "Kor: " . $_POST['kor'] . " Helyes". "<br>";
    }



    if(!isset($_POST['nem']) || strval($_POST['nem']) == false )
    {
        echo "Nem: " . $_POST['nem'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "Nem: " . $_POST['nem'] . " Helyes". "<br>";
    }

    echo "<br/>";
    echo "Kapott értékek: ";
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

if($rendben == true) {

    try {
        // Kapcsolódás
        $connect = new PDO('mysql:host=localhost;dbname=zh', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $connect->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        // Adatok beszúrása az adatbázisba
            $sqlInsert = "insert into regisztracio(id, email, nev, jelszo, kor, nem)
                              values(0, :email, :nev, :jelszo, :kor, :nem)";
            $stmt = $connect->prepare($sqlInsert);
            $stmt->execute(array(':email' => $_POST['email'],
                                 ':nev' => $_POST['nev'],
                                 ':jelszo' => $_POST['pwd'],
                                 ':kor' => $_POST['kor'],
                                 ':nem' => $_POST['nem']));


    } catch (PDOException $e) {
        echo "Hiba: " . $e->getMessage();
    }
}
?>
	</body>
</html>
