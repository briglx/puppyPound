<?php

session_start();

if(isset($_SESSION["puppies"])){
    $puppies = $_SESSION["puppies"];
}
else {
    $puppies = [];    
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $puppyName = $_POST["puppyName"];
    $puppies[] = $puppyName;

    $_SESSION["puppies"] = $puppies;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        Name: <input type="input" name="puppyName">
        <button>Submit</button>

        <ul>
            <?php foreach($puppies as $id=>$puppy){?>
                <li class="puppy"><input type="hidden" value="<?= $id ?>"><span><?= $puppy ?></span> <a href="#">Remove</a></li>
            <?php } ?>
        </ul>
    </form>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        $(function(){

            console.log("REady");

            $(".puppy a").on("click", function(e){
                var li = $(this).closest("li");

                var puppyId = $("input", li).val();
                
                li.remove();

                $.post("api.php", {puppyId: puppyId}, function(data){
                    console.dir(data);
                });
            });
        });
    </script>
</body>
</html>