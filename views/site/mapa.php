<?php

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;

$dir = explode(',', $coordgoogle);
$coord = new LatLng(['lat' => $dir[0], 'lng' => $dir[1]]);
$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '100%',
    'height' => '450',
]);

// Lets add a marker now
$marker = new \dosamigos\google\maps\overlays\Marker([
    'position' => $coord,
    'title' => 'Hospimed'
]);
$marker->attachInfoWindow(
    new \dosamigos\google\maps\overlays\InfoWindow([
        'content' => "<p>Hospimed</p>"
    ])
);
$map->addOverlay($marker);
?>
<div class="container">
    <?php echo $map->display(); ?>
</div>
