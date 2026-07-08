<?php


$fruits = [1=> "apple", 2=> "banana", 3=> "cherry"];

?>

<div>
    <?php foreach ($fruits as $key => $value): ?>
        <p><?= $key ?>: <?= $value ?></p>
    <?php endforeach; ?>
</div>