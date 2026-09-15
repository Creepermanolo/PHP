<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {

            $loggedUser = ['email' => $user['email'], 'fullname' => $user['fullname']];

            setcookie('LOGGED_USER', $loggedUser['email'], time() + 365*24*3600,"","",true,true);


        } else {

            $errorMessage = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['email'],
                $_POST['password']
            );
        }
    }
}


?>


<?php if (!isset($loggedUser)) : ?>
    <form action="index.php" method="POST">

        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                aria-describedby="email-help"
                placeholder="you@exemple.com"
            >
            <div id="email-help" class="form-text">
                L'email utilisé lors de la création de compte.
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
            >
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>


<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo htmlspecialchars($loggedUser['fullname']); ?> et bienvenue sur le site !
        <button type="button" class="déconnexion" onclick="window.location.href='logout.php'">Déconnexion</button>
    </div>
<?php endif; ?>