<?php
/// solucion geoposicion https://developers.google.com/maps/documentation/geolocation/intro
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use linslin\yii2\curl;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

//$configuracion['titulo_pagina']= $model['titulo'];


$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

$this->registerCssFile('@web/web/css/contacto.css', ['depends' => \app\assets_b\AppAsset::class, 'media' => 'screen', '']);
$this->registerjsFile('http://maps.google.com/maps/api/js?sensor=false', ['position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/web/js/gmap3.min.js', ['position' => \yii\web\View::POS_END]);


//obtener ubicacion


///**** PARA DIFERENTES UBICACIONE ****//


/*
$curl = new curl\Curl();
$params = [
    'considerIp' => 'true',
];
$dir = explode(',',$configuracion['coordgoogle']);
$response = $curl->setRequestBody(json_encode($params))
    ->setHeaders(['Content-Type' => 'application/json',])
    ->post('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyCG9mGLML4TLNsGQeLy3jg3ty2JA5kFotk');
$response=\yii\helpers\Json::decode($response);
/////
$coord = new LatLng(LatLng::createFromString($configuracion['coordgoogle']));
$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '100%',
    'height' => '455',
]);

$home = new LatLng(['lat' => $dir[0], 'lng' => $dir[1]]);
//$waypoints = new LatLng(['lat' => $dir[0], 'lng' => $dir[1]]);
if(!isset($response['error']))
    $origin = new LatLng($response['location']);
else
    $origin = new LatLng(LatLng::createFromString($configuracion['coordgoogle']));

// setup just one waypoint (Google allows a max of 8)

$directionsRequest = new \dosamigos\google\maps\services\DirectionsRequest([
    'origin' => $origin,
    'destination' => $home,
    //'waypoints' => $waypoints,
    'travelMode' => \dosamigos\google\maps\services\TravelMode::DRIVING
]);

// Lets configure the polyline that renders the direction
$polylineOptions = new \dosamigos\google\maps\overlays\PolygonOptions([
    'strokeColor' => '#FFAA00',
    'draggable' => true
]);

// Now the renderer
$directionsRenderer = new \dosamigos\google\maps\services\DirectionsRenderer([
    'map' => $map->getName(),
    'polylineOptions' => $polylineOptions
]);

// Finally the directions service
$directionsService = new \dosamigos\google\maps\services\DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);

// Thats it, append the resulting script to the map
$map->appendScript($directionsService->getJs());

// Lets add a marker now
$marker = new \dosamigos\google\maps\overlays\Marker([
    'position' => $coord,
    'title' => $configuracion['nombre_empresa']
]);
$marker->attachInfoWindow(
    new \dosamigos\google\maps\overlays\InfoWindow([
        'content' => "<p>{$configuracion['nombre_empresa']}</p>"
    ])
);

// Add marker to the map
$map->addOverlay($marker);*/


//*** END***///


$dir = explode(',', $configuracion['coordenadas']);
if (!isset($dir[1])) {
    $dir[0] = 0;
    $dir[1] = 0;
}
$coord = new LatLng(['lat' => $dir[0], 'lng' => $dir[1]]);

$map = new Map([
    'center' => $coord,
    'zoom' => 16,
    'width' => '100%',
    'height' => '380',
]);

// Lets add a marker now
$marker = new \dosamigos\google\maps\overlays\Marker([
    'position' => $coord,
    'title' => $configuracion['titulo_pagina']
    //'icon'  => Url::to('@web/web/images/contacicon.png')
]);
$marker->attachInfoWindow(
    new \dosamigos\google\maps\overlays\InfoWindow([
        'content' => "<p>{$configuracion['titulo_pagina']}</p>"
    ])
);
$map->addOverlay($marker);


$script = <<<CSS
.help-block-error
{
display: none;
}
.form-group {
   margin-bottom: 0px;
   padding-left: 0px;   
}

.form-group2 {
   margin-bottom: 0px;
   padding-left: 30px!important;   
}

.contact-area #contact-form input[type="text"], .contact-area #contact-form textarea {
    width: 60%;}
    
    .field-contactform-verifycode {
    width: 60%;
}

@media (max-width: 767px) {

.contact-area #contact-form input[type="text"], .contact-area #contact-form textarea {
    width: 90%;}
    
    .field-contactform-verifycode {
    width: 90%;
}

}
.services-page-banner {   background: url(web/images/Banner-superior-contact.jpg);   -webkit-background-size: cover;   -moz-background-size: cover;   -o-background-size: cover;   background-size: cover;}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

?>


<!-- content
    ================================================== -->
<div id="content">

    <!-- contact section
        ================================================== -->
    <div class="section-content contact-section">


        <!--<div class="map"></div>-->


        <div class="contact-area">
            <div class="title-section">
                <div class="container">
                    <h1 class="relaweybo" style="    font-size: 32px;">Formulario de Contacto</h1>
                    <p>Envíenos sus consultas y sugerencias.</p>

                </div>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['cuenta/contacto'], 'method' => 'post']); ?>


            <form id="contact-form">
                <div class="container">
                    <p>Por favor llene los campos del siguiente formulario y En breve nos podremos en contacto con
                        usted. <br> Gracias por escribirnos su opinión es importante para nosotros.</p>

                    <div class="row" align="center">

                        <?= $form->field($model, 'nombre')->label(false)->textInput(['class' => '', 'placeholder' => 'Nombre(requerido)', 'required' => true]) ?>



                        <?= $form->field($model, 'email')->label(false)->input('email')->textInput(['class' => '', 'placeholder' => 'Email(requerido)', 'required' => true]) ?>


                        <?= $form->field($model, 'telefono')->label(false)->input('email')->textInput(['class' => '', 'placeholder' => 'Telefono']) ?>


                        <?= $form->field($model, 'mensaje')->label(false)->textarea(['rows' => 3, 'class' => '', 'placeholder' => 'Mensaje...']) ?>


                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="" align="center"><div class="col-sm-4 col-xs-12">{image}</div><div class="col-sm-8 col-xs-12 ">{input}</div></div>',
                            'options' => ['class' => 'form-control'],
                        ])->label(false) ?>

                    </div>

                    <div class="submit-area" align="center">
                        <input type="submit" name="enviar" id="" class="vertodos" value="Enviar Mensaje">

                    </div>
                </div>
            </form>

            <?php ActiveForm::end(); ?>


        </div>

    </div>

</div>
<!-- End content -->


<div class="title-section">
    <div class="container">
        <h1 class="">Nuestra Ubicación</h1>

    </div>
</div>

<?= $map->display(); ?>







<?php
$script = <<<JS
 
	var contact = {"lat":"41.8744661", "lon":"-87.6614312"}; //Change a map coordinate here!


		var mapContainer = $('.map');
		mapContainer.gmap3({
			action: 'addMarker',
			marker:{
				options:{
					icon : new google.maps.MarkerImage('images/marker.png')
				}
			},
			latLng: [contact.lat, contact.lon],
			map:{
				center: [contact.lat, contact.lon],
				zoom: 15
				},
			},
			{action: 'setOptions', args:[{scrollwheel:false}]}
		);
	
JS;
$this->registerJs($script, \yii\web\View::POS_END);

?>
