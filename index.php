<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (isset($_GET['parking']) && !empty($_GET['parking'])) {
    $hotels = array_filter($hotels, fn($value) => $value['parking'] == filter_var($_GET['parking'], FILTER_VALIDATE_BOOLEAN));
    // var_dump($hotels);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP-Hotel</title>
</head>

<body>
    <!-- <?php
    foreach ($hotels as $hotel) {
        echo '<div>' . $hotel['name'] . ' ' . $hotel['description'] . ' ' . $hotel['parking'] . ' ' . $hotel['vote'] . ' ' . $hotel['distance_to_center'] . '</div>';
    }
    ?> -->
    <div class="container">
        <h1 class="text-center my-5">Hotels</h1>
        <form action="index.php" method="_GET" name="formFilter" class="mb-5">
            <select name="parking" id="parking">
                <option value="">Car Parking</option>
                <option value="true">With Parking</option>
                <option value="false">Without Parking</option>
            </select>
            <button type="submit" class="btn btn-outline-dark ms-2">Filter</button>
        </form>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach ($hotels as $hotel) { ?>

                <tr>
                    <?php

                    $carParking = $hotel['parking'] ? '&#10003;' : '&#10007;';

                    echo "<td>" . $hotel['name'] . "</td>";
                    echo "<td>" . $hotel['description'] . "</td>";
                    echo "<td>" . $carParking . "</td>";
                    echo "<td>" . $hotel['vote'] . "</td>";
                    echo "<td>" . $hotel['distance_to_center'] . ' km' . "</td>";

                    ?>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>



</body>

</html>