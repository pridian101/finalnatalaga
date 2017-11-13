<?php
$array = array(
    98 => array(
        'City' => 'Caracas',
        'Country' => 'Venezuela',
        'Continent' => 'Latin America',
    ),
    99 => array(
        'City' => 'Cairo',
        'Country' => 'Egypt',
        'Continent' => 'Middle East',
    ),
    105 => array(
        'City' => 'Abu Dhabi',
        'Country' => 'United Arab Emirates',
        'Continent' => 'Middle East',
    ),
    106 => array(
        'City' => 'Dubai',
        'Country' => 'United Arab Emirates',
        'Continent' => 'Middle East',
    ),
    107 => array(
        'City' => 'Montreal',
        'Country' => 'Canada',
        'Continent' => 'North America',
    )
);

$newArray = array();
foreach ($array as $row)
{
   $newArray[$row['Continent']][$row['Country']][] = $row['City'];
}

echo '<pre>'; print_r($newArray); echo '</pre>';
?>