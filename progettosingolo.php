<?php
session_start();
// Leggi i dati dal file JSON
$json = file_get_contents('webdesigner.json');
$projects = json_decode($json, true);

// Imposta un ID di default
$default_id = 1;

// Ottieni l'ID del progetto dall'URL e convertilo in intero
$id = isset($_GET['id']) ? intval($_GET['id']) : $default_id;

// Trova il progetto con l'ID specificato o usa il default
$project = null;
foreach ($projects as $p) {
    if ($p['id'] == $id) {
        $project = $p;
        break;
    }
}



// Se non c'è un progetto, mostra un messaggio di errore
if (!$project) {
    echo "<p>Progetto non trovato.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/main.css" rel="stylesheet" type="text/css">
    <link href="style/footer.css" rel="stylesheet" type="text/css">
    <link href="style/menu.css" rel="stylesheet" type="text/css">
    <link href="style/form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title><?php echo($project['title']); ?></title>
</head>
<header>
    <?php include 'menu.php'; ?>
</header>
<style>
    .sfondo {
        background: url(img/sfondo.jpg) no-repeat center center/cover;
        height: 400px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
    }
    .testo {
        font-size: 20px;
        padding: 20px;
        border-radius: 10px;
    }
</style>
<body>

<section class="sfondo">
    <div class="testo">
        <h1>BENVENUTO!</h1>
        <p>Esplora i dettagli del progetto.</p>
    </div>
</section>

<div class="profilo">
    <h2>DETTAGLI DEL PROGETTO</h2>
</div>
<div class="container">
    <div class="project">
        <img src="<?php echo($project['image']); ?>" alt="<?php echo($project['title']); ?>">
        <h3><?php echo($project['title']); ?></h3>
        <p><?php echo($project['description']); ?></p>
    </div>
</div>

<?php include 'form.php'; ?>

<hr>

<?php require ("footer.php"); ?>
</body>
</html>

