<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="test">
	<a href="index.html" class="edge">
		<img src="home.png">
	</a>
	<div id="text">TEST ONLINE - INF.03</div>
	<div id="dummy" class="edge"></div>
    </h1>
    <form action="check.php" method="POST">
    <?php
    include 'questions.php';

    session_start();

    function generateRandomLenght(int $lenght, int $count) : array
    {
        $randomSeq = [];

        $i = 0;
        while($i < $lenght)
        {
            $random = rand(0,$count);
            if(!in_array($random,$randomSeq))
                $randomSeq[$i++] = $random;
        }
        return $randomSeq;
    }

        $i = 0;
        $losulosu = generateRandomLenght($_POST["val"],count($Questions)-1);
        foreach($losulosu as $los)
        {
            $_SESSION["e$i"] = $Questions[$los];
            $Questions[$los]->get_HTML($i++);
        }
        
        $_SESSION['ilosc'] = $i;
    ?>
        <div id="buttons">
            <button type="submit">Sprawdź</button> <button type="reset">Wyczyść</button>
        </div>
    </form>
</body>
</html>
