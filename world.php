<?php


$host = getenv('IP');
$username = 'Jason7';
$password = 'professionalism';
$dbname = 'world';
$country = $_GET['country'];
$every = $_GET['all'];
$cities = $_GET['cities'];


if ($every == true && (isset($every) || !empty($all))) 
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
    
    echo '<table>' .'<tr>'.'<th>'.'Name '.'</th>'.'<th>' ."Continent ".'</th>'.'<th>' ."Independence ".'</th>'. '<th>' ."Head of State ". '</th>'.'</tr>';
    foreach ($results as $row) 
    {
        echo '<tr>'.PHP_EOL;
        echo '<td> ' . $row['name']. '</td>'. '<td>' . $row['continent'] .'</td>'.'<td>'. $row['independence_year'] .'</td>'.'<td>'. $row['head_of_state'].'</td>';
        echo PHP_EOL;
        
    }
    echo '</table>';

}
elseif (isset($country) || !empty($country)) 
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo '<table>' .'<tr>'.'<th>'.'Name '.'</th>'.'<th>' ."Continent ".'</th>'.'<th>' ."Independence ".'</th>'. '<th>' ."Head of State ". '</th>'.'</tr>';
    foreach ($results as $row) 
    {
        echo '<tr>'.PHP_EOL;
        echo '<td> ' . $row['name']. '</td>'. '<td>' . $row['continent'] .'</td>'.'<td>'. $row['independence_year'] .'</td>'.'<td>'. $row['head_of_state'] .'</td>';
        echo PHP_EOL;
        
    }
    echo '</table>';    
    
}

elseif (isset($cities) || !empty($cities)) 
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT countries.code, cities.country_code FROM cities JOIN countries.code = cities.country_code; ");
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo '<table>' .'<tr>'.'<th>'.'Name '.'</th>'.'<th>' ."District ".'</th>'.'<th>' ."Population ".'</th>'. '</tr>';
    foreach ($results as $row) 
    {
        echo '<tr>'.PHP_EOL;
        echo '<td> ' . $row['name']. '</td>'. '<td>' . $row['district'] .'</td>'.'<td>'. $row['population'] .'</td>';
        echo PHP_EOL;
        
    }
    echo '</table>';  

}