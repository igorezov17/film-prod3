<?php

/**
 * @var Kernel\View\ViewInterface $view;
 */

?>

<?php $view->components('start') ?>
    <h1>Register</h1>

    <form action="/register" method="POST">
        <div>
            <label for="email">email</label><br>
            <input type="text" name="email">
            <?php if ($session->has('email')) { ?>
    
                <ul style="color: red;">

                    <?php foreach ($session->getFlash('email') as $error) { ?>

                        <li><?php echo $error ?></li>

                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div>
        <label for="password">password</label><br>
        <input type="password" name="password">
        <?php if ($session->has('password')) { ?>
    
            <ul style="color: red;">

                <?php foreach ($session->getFlash('password') as $error) { ?>

                    <li><?php echo $error ?></li>

                <?php } ?>
            </ul>
        <?php } ?>
        </div>
        <div>
            <button>Send</button>
        </div>
    </form>

<?php $view->components('end') ?>