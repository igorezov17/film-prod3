<?php

/**
 * @var Kernel\View\View;
 * 
 */

?>

<?php $view->components('start') ?>

<h1>Add new movies</h1>
<form action="/admin/movies/add" method="POST">
    <p>
        Сообщение
    </p>
    <input type="text" name="name">

    <?php if ($session->has('name')) { ?>
    
        <ul style="color: red;">

            <?php foreach ($session->getFlash('name') as $error) { ?>

                <li><?php echo $error ?></li>

            <?php } ?>
        </ul>
    <?php } ?>

    <div>
        <button style="margin: 10px 0px;" type="submit">Send</button>
    </div>

</form>

<?php $view->components('end') ?>