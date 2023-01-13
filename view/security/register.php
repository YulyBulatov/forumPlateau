<form method="post" action="index.php?ctrl=security&action=registerNewUser">

    <label>E-mail:

            <input type="email" maxlength="100" pattern="^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+[A-Za-z]{2,}$" name="email" required>

    </label>

    <label>Pseudonyme:

            <input type="text" maxlength="25" name="pseudonyme" required>

    </label>

    <label>Mot de Passe:

            <input type="password" min="8" max="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}" name="password" required>

    </label>

    <label>Confirmer Mot de Passe:

            <input type="password" min="8" max="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}" name="password_verify" required>

    </label>

    <input type="submit" name="submit" value="S'enregistrer">


</form>