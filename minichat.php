<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-chat</title>
</head>
<style>
form
{
    text-align: center;
    padding: 10px;
}
</style>
<body>
    
    <form action="minichat_post.php" method="post">
        <p>
        <!-- nick -->
        <label for="preudo">Pseudo</label> : 
        <input type="text" name="pseudo" value="MimiT"> <br/>
        <!-- msg -->
        <label for="message">Message</label> : 
        <input type="text" name="message" id="message"> <br/>
        <!-- send-->
        <input type="submit" value="Send" />
        </p>
    </form>

    <?php
// Connection to the Database
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Recuperate the last 10 msgs
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Show all data in protected manner with htmlspecialchars (why doesn't work!!)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars_decode($donnees['pseudo']) . '</strong> : ' . htmlspecialchars_decode($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>

</body>
</html>