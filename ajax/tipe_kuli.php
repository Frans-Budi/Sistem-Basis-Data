<?php
require '../function.php';

$keahlian = QueryData("SELECT * FROM keahlian");
?>

<?php foreach ($keahlian as $value) : ?>
    <?php if ($value['tipe'] == 'Kuli') : ?>
        <input type="checkbox" name="<?= $value["id"] ?>" id="<?= $value["jenis_keahlian"] ?>">
        <label for="<?= $value["jenis_keahlian"] ?>"><?= $value["jenis_keahlian"] ?></label>
        <br>
    <?php endif; ?>
<?php endforeach; ?>