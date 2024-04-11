<?php

/**
 * @var Kernel\View\ViewInterface $view;
 */

?>

<?php $view->components('start') ?>
    <h1>Login</h1>

    <form action="/login" method="POST">
        <div>
            <?php if ($session->has('error')) { ?>     
                <p style="color: red;"> <?php
                    echo $session->getFlash('error');
                    ?>          
                </p>
            <?php } ?>
        </div>
        <div>
            <label for="email">email</label><br>
            <input type="text" name="email">

        </div>
        <div>
            <label for="password">password</label><br>
            <input type="password" name="password">
        </div>
        <div>
            <button>Login</button>
        </div>
    </form>

<?php $view->components('end') ?>