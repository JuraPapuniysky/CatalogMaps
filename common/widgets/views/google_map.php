<?php

    $coord = new \dosamigos\google\maps\LatLng(['lat' => $lat, 'lng' => $lng]);
    $map = new \dosamigos\google\maps\Map([
        'center' => $coord,
        'zoom' => 14,
    ]);
    $marker = new \dosamigos\google\maps\overlays\Marker([
    'position' => $coord,
    'title' => $title,
    ]);
    $map->addOverlay($marker);
    echo $map->display();

?>




