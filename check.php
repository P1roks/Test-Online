<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test Online</title>

    <style>
        .quest{
            text-align:center;
        }
        .correct{
            color:lime;
        }
        .wrong{
            color:red;
        }
        .invalid{
            color:Aqua;
        }
        #result{
            display:flex;
            justify-content:center;
            margin-top:2%;
            padding-bottom: 2%;
            zoom:200%;
        }
    </style>
</head>
<body>
    <h1 id="test">
	<a href="index.html" class="edge">
		<img src="home.png">
	</a>
	<div id="text">TEST ONLINE - INF.03</div>
	<div id="dummy" class="edge"></div>
    </h1>

    <?php
    include 'questions.php';

    session_start();


    $length = $_SESSION['ilosc'];
    $points = 0;
    $maxPoints = 0;

    echo "<div id=\"checked\">";
    echo "<div id=\"allQuest\">";
    for($i = 0; $i < $length; ++$i)
    {
        $j = $i+1;
        $currentQuestion = $_SESSION["e$i"];
        $maxPoints += $currentQuestion->points;

        if(empty($_POST["$i"]))
        {
            echo "<div class=\"quest\">" .
            "<span>Pytanie $j: ($currentQuestion->points pkt.)</span>" .
            "<span class=\"invalid\"> Nie udzieliłeś odpowiedzi! </span>" .
            "<span class=\"correct\"> Poprawna odpowiedź:" .  $currentQuestion->correctAnswer() ."</span>" .
            "</div>";
            continue;
        }

        if ($_POST["$i"] > 0)
        {
            $points += (int)$_POST["$i"];
            echo "<div class=\"quest\">" .
            "<span>Pytanie $j: ($currentQuestion->points pkt.)</span>" .
            "<span class=\"correct\">Twoja odpowiedź:" .  $currentQuestion->correctAnswer() ."</span>" .
            "</div>";
            continue;
        }

        echo "<div class=\"quest\">" .
             "<span>Pytanie $j: ($currentQuestion->points pkt.)</span>" .
             "<span class=\"correct\">Poprawna odpowiedź:" .  $currentQuestion->correctAnswer() ."</span>" .
             "<span class=\"wrong\">Twoja odpowiedź:". $currentQuestion->Answers[abs($_POST["$i"])] ."</span>" .
             "</div>";
    }
    echo "</div>";

    $odmiana = $points == 1 ? "punkt" : (($points<=4 && $points!=0) ? "punkty" : "punktów");
    $odmianaMax = $maxPoints == 1 ? "punkt" : (($maxPoints<=4 && $maxPoints!=0) ? "punkty" : "punktów");

    $procent = round($points/$maxPoints * 100,2);
    echo "<div id=\"result\">Uzyskałeś $points $odmiana. Maksymalny wynik to $maxPoints $odmianaMax. Stanowi to $procent%</div>";
    echo "</div>";
    ?>
</body>
</html>

