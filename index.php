<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST["naam"],
        'email' => $_POST["email"],
        'message' => $_POST["commentaar"]
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
    <iframe width="560" height="315" src="https://youtube.com/embed/yaapnjOofXI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <form action="" method="POST">
            <div>
                naam: <input type="text" name="naam" value="">
            </div>
            <div>
                email: <input type="email" name="email" value="">
            </div>
            <div> comment: </div>
            <div> 
                <textarea name="commentaar" cols= "26" rows="3"></textarea>
            </div>
            <input type="submit" value="Verzenden">
        </form>
        <h2>Reacties</h2>
    <p></p>


    <?php
    
    foreach ($getReactions as $reaction){
        echo("<div class='commentaar'>");
        echo "<h3>".$reaction['name']."</h3>";
        echo"<p>".$reaction['commentaar']."</p>";
        echo("</div>");
    }

    ?>

</body>

</html>

<?php
$con->close();
?>