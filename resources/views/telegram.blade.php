<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion via Telegram</title>
</head>
<body>
    <h1>Connectez-vous à l'application via Telegram</h1>
    <form action="/connect-telegram" method="post">
        @csrf
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="telegram_id">ID Telegram:</label><br>
        <input type="text" id="telegram_id" name="telegram_id" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
