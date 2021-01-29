<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Warrior('Cloud');
$player2 = new Magician('Vivi');
$player3 = new Archer('Barret');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Baston</title>
</head>
<body>
    <h1>Les Combatants entrent en scene</h1>
    <h3><?= "$player2->name vs $player3->name"; ?></h3>
    <div class="flex">
        <section>
            <?php while ($player2->isAlive() && $player3->isAlive()): ?>
                <div>
                    <div class="firstTurn flex">
                        <div>
                            <p><?= $player2->turn($player3) ?></p>
                            <?php $result = "$player2->name a gagné !" ?>
                        </div>
                    </div>
                    <div class="secondTurn flex">
                        <?php if ($player3->isAlive()): ?>
                            <p><?= $player3->turn($player2)?></p>
                            <?php $result = "$player3->name a gagné !" ?>
                        <?php endif ?>
                    </div>
                </div>
            <?php endwhile ?>
        </section>
        <aside>
            <!-- <img class="roundedImage roundedImageShadow" src="./img/Cloud-FFVIIArt.png" alt="Cloud"> -->
            <img class="roundedImage roundedImageShadow" src="./img/kisspng-final-fantasy-ix-vivi-orunitia-square-enix-co-lt-vivi-profil-esport-du-joueur-vsleague-online-e-5c0f6e37699865.5395285215445151274325.jpg" alt="Vivi">
            <img class="roundedImage roundedImageShadow" src="./img/Barret-FFVIIArt.png" alt="Barett">
        </aside>
    </div>
    <h3><?= $result;?></h3>
    
</body>
</html>
