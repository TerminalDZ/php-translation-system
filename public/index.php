<?php
require_once __DIR__ . '/../src/Translator.php';

$translator = new Translator();
$tr = $translator->getTranslations();
?>

<!DOCTYPE html>
<html lang="<?php echo $tr['LANGUAGE_CODE']; ?>" dir="<?php echo $tr['directory']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translated Page</title>
</head>
<body>
    <h1><?php echo $tr['my_account']; ?></h1>
    <p><?php echo $tr['email']; ?></p>
    <p><?php echo $tr['phone']; ?></p>
</body>
</html>
