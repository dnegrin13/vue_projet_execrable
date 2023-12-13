<?php
$pdo = new PDO("mysql:host=localhost;dbname=vue_exo", "Stagiaire", "Stagiaire");


if (!empty($_POST['name']) 
&& !empty($_POST['street_name']) 
&& !empty($_POST['city']) 
&& !empty($_POST['zip_code'])) {
    $sql = "INSERT INTO user (name, street_name, city, zip_code) VALUE (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_POST["name"], $_POST["street_name"], $_POST['city'], $_POST['zip_code']])) {
        $response = [
            'msg' => 'Utilisateur Enregistrer',
        ];
    } else {
        $response = [
            'msg' => "Erreur lors de l'ajout",
        ];
    }
    
}
else {
    $response = [
        'msg' => "Veuillez remplir le formulaire correctement",
    ];
}
echo json_encode($response);