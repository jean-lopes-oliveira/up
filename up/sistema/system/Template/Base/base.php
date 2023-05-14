<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?= $this->section("head")?>
    <title><?= $this->e($title) ?></title>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,100&display=swap" rel="stylesheet">
    </head>
    <body>
        <header id="header" class="bg-primary">
            <?= $this->section("header") ?>
        </header>
        <main class="container-fluid">
            <?= $this->section("conteudo")?>
        </main>
        <footer id="footer" class="container-fluid bg-primary">
            <?= $this->section("footer");?>
        </footer>
        
    </body>
</html>