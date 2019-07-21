<?php
foreach ($users as $user) {
?>
    <h3>Olá, <?php echo $user->first_name ?></h3>
    <h4>Sobrenome: <?php echo $user->last_name ?></h4>
    <p><?php echo $user->email ?></p>
    <hr/>
<?php
}
?>