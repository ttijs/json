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

$jsonobj = '
{
    "Oppenheimer": 2022,
    "Barbie":2023
}
';


print "Met zonder json_decode is het gewoon een string (een stuk tekst). Dit is geen gestructureerde data.";
print "<br>";
print "<br>";

print_r($jsonobj);


echo "<hr>";


print "Met json_decode is het gestructureerde data (een object)";
print "<br>";
print "<br>";


$films = json_decode($jsonobj);

print_r($films);


echo "<hr>";


print 'Nu kun je de data heel goed benaderen (aanwijzen wat je wilt hebben)';
print "<br>";
print "<br>";


echo "<ul>";
    echo "<li>";
        echo $films->Oppenheimer;
    echo "</li>";
    echo "<li>";
        echo $films->Barbie;
    echo "</li>";
echo "</ul>";

// $key = array_search(2023, (array)$films);
// echo $key;

//exit();

echo "<hr>";

print 'Om te zoeken in de data, of te loopen over de data, kun je er een array van maken met (array) $objectnaam';
print "<br>";
print 'hieronder de output van print_r( (array) $films);';
print "<br>";
print "<br>";

print_r( (array) $films);


print "<br>";
print "<br>";

$films_array = (array) $films;

echo "<hr>";

print 'Voorbeeld van zoeken in de array naar keys met een bepaalde value';
print "<br>";
print "<br>";



$key = array_search('2023', $films_array); // hier wordt de array_search gedaan om zo de key te vinden.
echo "<p>";
echo "film uit 2023 = " . $key;
echo "</p>";

echo "<hr>";

print 'Het maken van een array uit een object kun je ook direct doen, in de arraysearch';
print "<br>";
print "<br>";


# hoe vind je de key van een PHP-object
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

echo "<hr>";
print "<br>";
print "<br>";


//exit();

# ------------------------------------------------------------
echo '<h2>Je kunt ook bij het json_decoderen, direct van een object een array van maken, door json_decode($data, TRUE);</h2>';

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