<?php
session_start();
// Leggi i dati dal file JSON
$json = file_get_contents('webdesigner.json');
$projects = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/main.css" rel="stylesheet" type="text/css">
    <link href="style/footer.css" rel="stylesheet" type="text/css">
    <link href="style/menu.css" rel="stylesheet" type="text/css">
    <link href="style/form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>Portfolio</title>
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
        <p>Esplora il mio sito!</p>
    </div>
</section>

<div class="profilo">
    <h2>PORTFOLIO</h2>
</div>

<div class="container">
    <?php foreach ($projects as $project): ?>
        <div class="project">
            <!-- Crea un link con l'ID del progetto -->
            <a href="progettosingolo.php?id=<?php echo $project['id']; ?>">
                <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
            </a>
            <h3><?php echo $project['title']; ?></h3>
            <p><?php echo $project['description']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'form.php'; ?>
<?php include 'footer.php'; ?>
</body>
</html>
