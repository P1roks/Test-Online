<?php
    class Question{
        public $question,$index,$points,$Answers;
        //public static $numberOfQuestion = 1;

        function __construct(string $question,array $Answers,int $index,int $points)
        {
            $this->points = $points;
            $this->question = $question;
            $this->Answers = $Answers;
            $this->index = $index;
        }

        private function checkIndex(int $index) : int
        {
            if($this->index === $index)
            {
                return $this->points;
            }
            return -$index;
        }

        function get_HTML(int $name)
        {
            echo "<div class=\"quest\">";

            echo "<h3><p class=\"id\">" /* . Question::$numberOfQuestion . */. "</p><p class=\"content\">" . $this->question . "</p> (" . $this->points . "pkt.)</h1>";
            
	    echo "<div class=\"answers\">";
            for($i = 0, $l='A'; $i<4; ++$i,++$l)
            {
            $value = $this->checkIndex($i);
            $label = $name . "" . $i;
            echo "<div class=\"answer\">
            <input type=\"radio\" name=\"$name\" value=$value id=\"$label\">
            <label for=\"$label\">$l." .  $this->Answers[$i] . "</label></div>";
            }
            echo "</div>";
            echo "</div>";
        }

        public function correctAnswer(): string
        {
            return $this->Answers[$this->index];
        }
    }

    $Questions = [ 
        new Question("Czym jest PHP?",[
            "Skryptowym językiem programowania zaprojektowanym do generowania stron internetowych i budowania aplikacji webowych w czasie rzeczywistym.",
            "Niskopoziomym językim, służącym do programowania mikroprocesorów",
            "Językiem znaczników stosowanym do tworzenia dokumentów hipertekstowych",
            "Językiem, stosowanym do tworzenia gier"],0,1),
        new Question("Kaskadowe arkusze stylów tworzy się w celu:",[
            "połączenia struktury dokumentu strony z właściwą formą jego prezentacji",
            "blokowania jakichkolwiek zmian w wartościach znaczników już przypisanych w pliku CSS",
            "nadpisywania wartości znaczników już ustawionych na stronie",
            "ułatwienia formatowania strony"],0,2),
        new Question("Aby obsłużyć połączenie z bazą MySQL podczas tworzenia aplikacji internetowej, 
        można wykorzystać język",[
            "XHTML",
            "CSS",
            "Basic",
            "PHP"
        ],3,2),
        new Question("Formatem zapisu rastrowych plików graficznych z kompresją bezstratną jest",[
            "CDR",
            "SVG",
            "PNG",
            "JNG"
        ],2,4),
        new Question("<img src=\"img\phpcodesnippet.png\">W podanym kodzie PHP zdefiniowano:",[
            "dwa obiekty",
            "dwie właściwości",
            "jedną właścwiość",
            "dwie metody"
        ],1,5),
        new Question("Która z deklaracji funkcji w języku C++ ma parametr wejściowy typu rzeczywistego, a zwraca wartość całkowitą?",[
            "void foo(int a);",
            "auto foo(auto a);",
            "int foo(float a);",
            "float foo(int a)"
        ],2,1),
        new Question("W języku HTML atrybut alt znacznika img jest wykorzystywany w celu zdefiniowania",[
            "tekstu, który będzie wyświetlony, jeśli nie może być wyświetlona grafika",
            "ścieżki i nazwy pliku źródłowego grafiki",
            "podpisu, który zostanie wyświetlony pod grafiką",
            "atrybutów grafiki, takich jak rozmiar, obramowanie, wyrównanie"
        ],0,3),
        new Question("<img src=\"img\sql.jpg\">Przedstawione polecenie MySQL ma za zadanie",[
            "Usunąć kolumnę tytul z tabeli ksiazki",
            "Zmienić typ kolumny w tabeli ksiazki",
            "Zmienić nazwę kolumny w tabeli ksiazki",
            "Dodać do tabeli ksiazki kolumnę tytul"
        ],1,5),
        new Question("Pseudoklasa hover, w CSS aktywuje się:",[
            "Po kliknięciu na dany element",
            "Po najechaniu na dany element",
            "Zawsze",
            "Po odwiedzeniu linku"
        ],1,1),
        new Question("Aby zadeklarować pole klasy, do którego mają dostęp jedynie metody tej 
        klasy i pole to nie jest dostępne dla klas pochodnych, należy użyć kwalifikatora dostępu",[
            "friend",
            "public",
            "private",
            "protected"
        ],2,3),
        new Question("W języku PHP zmienna \$_GET jest zmienną",[
            "predefiniowaną, używaną do gromadzenia wartości formularza po nagłówkach zlecenia HTTP 
            (danych z formularza nie można zobaczyć w adresie)",
            "zdefiniowaną przez twórcę strony, służącą do przekazywania danych z formularza przez adres strony",
            "predefiniowaną, używaną do przekazywania danych do skryptów PHP poprzez adres strony",
            "zwykłą, zdefiniowaną przez twórcę strony"
        ],2,2),
        new Question("Przy użyciu którego znacznika w języku HTML nie można umieścić na stronie grafiki dynamicznej?",[
            "&ltobject&gt",
            "&ltstrike&gt",
            "&ltembed&gt",
            "&ltimg&gt"
        ],1,3),
        new Question("Selektor CSS a:link {color:red} zawarty w kaskadowych arkuszach stylów definiuje",[
            "klasę",
            "identyfikator",
            "pseudoelement",
            "pseudoklasę"
        ],3,4),
        ];
?>
