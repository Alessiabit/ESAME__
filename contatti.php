<?php include 'menu.php'; ?>

<?php
// Funzione per leggere e decodificare il file JSON
function get_page_data($page) {
    $file = 'pagine.json';  // Il percorso del file JSON

    if (file_exists($file)) {
        $json_data = file_get_contents($file);  // Leggi il file JSON

        // Aggiungi controllo per errori di decodifica JSON
        $pages = json_decode($json_data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'title' => 'Errore di decodifica',
                'content' => 'Errore durante la decodifica dei dati JSON.'
            ];
        }

        // Se esiste la pagina richiesta nel JSON, restituisci i dati
        if (isset($pages[$page])) {
            return $pages[$page];
        } else {
            return [
                'title' => 'Pagina non trovata',
                'content' => 'Spiacenti, la pagina che stai cercando non esiste.'
            ];
        }
    } else {
        // Se il file JSON non esiste, restituisci un messaggio di errore
        return [
            'title' => 'Errore',
            'content' => 'Il file di dati non esiste.'
        ];
    }
}

// Imposta la pagina 
$page = isset($_GET['page']) ? $_GET['page'] : 'contatti';

// Ottieni i dati della pagina dal file JSON
$page_data = get_page_data($page);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/footer.css" rel="stylesheet" type="text/css">
    <link href="style/form.css" rel="stylesheet" type="text/css">
    <link href="style/menu.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title><?php echo $page_data['title']; ?></title>

    <style>
        html, body {
            background: url(img/sfondo.jpg) no-repeat center center/cover;
            color: white;
            max-height: fit-content;
        } 

        form {
            margin-top: 100px;
        }
        footer{
            margin-top: 120px;

        }
        .logo img {
            height: 150px;
            width: 150px;
        }

        @media (max-width: 768px) {
            body {
                min-height: 700px;
            }
        }
    </style>
</head>
<body>
    <?php require 'form.php'; ?>
    
</body>
<footer>
<?php require 'footer.php'; ?>
</footer>
</html>
