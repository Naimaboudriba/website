<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "feedback";

$conn = mysqli_connect($host, $username, $password, $database);



if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$nom = $_POST['nom'];
$email = $_POST['email'];
$commentaire = $_POST['commentaire'];
$evaluation = $_POST['evaluation'];

// Insérer les données dans la table Utilisateurs
$sql = "INSERT INTO Utilisateurs (Nom, Email) VALUES ('$nom', '$email')";
if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "Nouvel enregistrement créé avec succès. Le dernier ID inséré est : " . $last_id;
} else {
  echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Insérer les données dans la table Commentaires
$sql = "INSERT INTO Commentaires (ID_Utilisateur, Commentaire) VALUES ('$last_id', '$commentaire')";
if ($conn->query($sql) === TRUE) {
  echo "Nouveau commentaire créé avec succès.";
} else {
  echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Insérer les données dans la table Évaluations
$sql = "INSERT INTO Évaluations (ID_Utilisateur, Étoiles) VALUES ('$last_id', '$evaluation')";
if ($conn->query($sql) === TRUE) {
  echo "Nouvelle évaluation créée avec succès.";
} else {
  echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
