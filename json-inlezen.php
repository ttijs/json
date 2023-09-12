<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo '<pre>';

   
   
   
    echo '<h1>Eenvoudig json-object voorbeeld</h1>';

    $jsonobj = '{"Oppenheimer":2022,"Barbie":2023}';
   
 

    $films = json_decode($jsonobj);

    var_dump($films);

    echo '<p>';
    echo $films->Oppenheimer;
    echo '</p>';
    
    echo "<ul>";
        echo "<li>";
            echo $films->Oppenheimer;
        echo "</li>";
        echo "<li>";
            echo $films->Barbie;
        echo "</li>";

        // $key = array_search(2023, (array)$films);
        // echo $key;

    echo "</ul>";
    //exit();

    # hoe vind je de key van een gewone PHP-array
    $films = array("Oppenheimer"=>2022,"Barbie"=>2023);
    $key = array_search('2023', $films); // hier wordt de array_search gedaan om zo de key te vinden.
    echo "<p>";
    echo "film uit 2023 = " . $key;
    echo "</p>";


    # hoe vind je de key van een PHP-object
    $jsonobj = '{"Oppenheimer":2022,"Barbie":2023}';
    $key = array_search('2022', (array)$films); // hier gebeuren 2 dingen: het object films wordt omgezet naar een array, en daarna wordt de array_search gedaan.
    echo "<p>";
    echo "film uit 2022 = " . $key;
    echo "</p>";


        # ------------------------------------------------------------
    echo '<hr>';
    echo '<h1>iets uitgebreidere json, met een object met daarin een array van objecten</h1>';    
    echo '<h2>zonder conversie van objects naar arrays</h2>';


    // $data = array(
    //     'films' => array(
    //         array(
    //             'titel' => "Oppenheimer",
    //             'jaar' => 2022
    //         ),
    //         array(
    //             'titel' => "Barbie",
    //             'jaar' => 2023
    //         ),
    //     )
    // );
    // echo json_encode($data);

    // bovenstaande wordt:
    $filmjson = '{
        "films":[
            {"titel":"Oppenheimer","jaar":2022},
            {"titel":"Barbie","jaar":2023}
        ]
    }';




    $filmjsondecoded = json_decode($filmjson);

    // echo '<p>';
    // var_dump($filmjsondecoded);
    // echo '</p>';

    //var_dump($filmjsondecoded->films);
    $films = $filmjsondecoded->films;

    // echo '<p>';
    // var_dump($films);
    // echo '</p>';

    echo '<ul>';
    foreach ($films as $film) {
        //var_dump($film);
        echo '<li>' . $film->titel . '</li>';
    }
    echo '</ul>';
    //$films = $filmjsondecoded['films'];

    //exit();

    # ------------------------------------------------------------
    echo '<hr style="margin-left: 10%">';
    echo '<h2>met conversie van objects naar arrays, door json_decode($data, TRUE);</h2>';

    $filmjsondecoded = json_decode($filmjson, TRUE);
    //var_dump($filmjsondecoded);
    $films = $filmjsondecoded['films'];


    // Dit kan ook: de json wat simpeler maken, door de array met alleen maar item 'films' eruit te halen
    // $filmjson = '
    //     [
    //         {"titel":"Oppenheimer","jaar":2022},
    //         {"titel":"Barbie","jaar":2023}
    //     ]
    // ';
    // $films = json_decode($filmjson, TRUE);

    //var_dump($films);

    echo '<ul>';
    foreach ($films as $film => $gegevens) {
        //var_dump($film);
        //var_dump($gegevens);
        echo '<li>' . $gegevens['titel'] . '</li>';
    }
    echo '</ul>';
    //exit();

    # ------------------------------------------------------------

    echo '<hr>';
    echo '<h1>iets uitgebreidere json</h1>';

    $filmjson = '{
        "films":[
            {"titel":"Oppenheimer","jaar":2022, "cast":["Cillian Murphy", "Florence Pugh", "Robert Downey jr.", "Emily Blunt"]},
            {"titel":"Barbie","jaar":2023, "cast":["Margot Robbie", "Ryan Gosling"]}
        ]
    }';


    $filmjsondecoded = json_decode($filmjson);
    //var_dump($filmjsondecoded);
    //var_dump($filmjsondecoded->films);
    $films = $filmjsondecoded->films;
    echo '<ul>';
    foreach ($films as $film) {
        //var_dump($film);
        echo '<li>titel: ' . $film->titel . '</li>';
        //var_dump($film->cast);
        echo '<li>cast: ' . join(' - ', $film->cast) . '</li>';
        echo "<br>";
    }
    echo '</ul>';
    //$films = $filmjsondecoded['films'];


    # ------------------------------------------------------------

    echo '<hr>';
    echo '<h1>json uit bestand of url:</h1>';
    $json = file_get_contents('films.json');
    // var_dump($json);
    // exit();
    $filmjson = json_decode($json);
    //var_dump($filmjson);
    $films = $filmjson->films;
    //var_dump($films);

    echo '<ul>';
    foreach ($films as $film) {
        //var_dump($film);
        echo '<li>id: ' . $film->id . '</li>';
        echo '<li>titel: ' . $film->titel . '</li>';
        echo '<li>cast: ' . join(', ', $film->cast) . '</li>';
        //var_dump($film->cast);
        echo "<br>";
    }
    echo '</ul>';


    

    echo '</pre>';


    ?>

</body>

</html>