<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';



    echo '<pre>';


    var_dump(json_decode($jsonobj));


   $users = json_decode($jsonobj);
   echo $users->Peter;

    # ------------------------------------------------------------


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



    echo '<hr>';
    echo '<h1>zonder conversie van objects naar arrays</h1>';

    $filmjsondecoded = json_decode($filmjson);
    //var_dump($filmjsondecoded);
    //var_dump($filmjsondecoded->films);
    $films = $filmjsondecoded->films;
    echo '<ul>';
    foreach ($films as $film) {
        //var_dump($film);
        echo '<li>' . $film->titel . '</li>';
    }
    echo '</ul>';
    //$films = $filmjsondecoded['films'];


   # ------------------------------------------------------------
    echo '<hr>';
    echo '<h1>met conversie van objects naar arrays, door json_decode($data, TRUE);</h1>';

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
        echo '<li>'. $gegevens['titel'] . '</li>';
    }
    echo '</ul>';




    echo '</pre>';


    ?>

</body>

</html>