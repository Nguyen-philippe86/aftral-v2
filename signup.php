<?php
require 'includes/header.php';
include 'includes/class/Model.php';

$model = new Model();

if (!empty($_POST['submit_signup']) && !empty($_POST['username_signup']) && !empty($_POST['password1_signup'])) {
    $pass_su = htmlspecialchars($_POST['password1_signup']);
    $repass_su = htmlspecialchars($_POST['password2_signup']);
    $username_su = htmlspecialchars($_POST['username_signup']);
    $model->inscription($username_su, $pass_su, $repass_su);
}
?>

    <div class="container">
        <div class="columns">
            <div class="column">

                <h2 class="">Nouveau profil</h2>
                <form action="" method="post">
                    <div class="field">
                        <label class="label">Nom d'utilisateur</label>
                        <div class="">
                            <input class="input" type="username" placeholder="Choisir un nom d'utilisateur" value="" name="username_signup">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="">
                            <input class="input" type="password" placeholder="Choisir un mot de passe" value=""
                                   name="password1_signup">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Entrez à nouveau votre mot de passe</label>
                        <div class="">
                            <input class="input" type="password" placeholder="Entrez à nouveau votre mot de passe"
                                   value=""
                                   name="password2_signup">
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <input type="submit" value="Créer" name="submit_signup" class="">
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
<?php
require 'includes/footer.php';