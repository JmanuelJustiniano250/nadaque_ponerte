<?php
$script = <<<CSS
/*  bhoechie tab */
div.bhoechie-tab-container{
z-index: 10;
background-color: #ffffff;
padding: 0 !important;
border-radius: 4px;
-moz-border-radius: 4px;
border:1px solid #ddd;
margin-top: 20px;
margin-left: 50px;
-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
box-shadow: 0 6px 12px rgba(0,0,0,.175);
-moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
background-clip: padding-box;
opacity: 0.97;
filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
padding-right: 0;
padding-left: 0;
padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
color: #ff5a96;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
border-top-right-radius: 0;
-moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
border-bottom-right-radius: 0;
-moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
background-color: #ff5a96;
background-image: #ff5a96;
color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
content: '';
position: absolute;
left: 100%;
top: 50%;
margin-top: -13px;
border-left: 0;
border-bottom: 13px solid transparent;
border-top: 13px solid transparent;
border-left: 10px solid #ff5a96;
}

div.bhoechie-tab-content{
background-color: #ffffff;
/* border: 1px solid #eeeeee; */
padding-left: 20px;
padding-top: 10px;
}

div.bhoechie-tab-menu div.list-group>a {
    margin-bottom: 0;
    cursor: inherit;
}



div.bhoechie-tab div.bhoechie-tab-content:not(.active){
display: none;
}
.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus{
border-color: #ff5a96;
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
    <div class="list-group">
        <a href="#" class="list-group-item <?php if ($active == 1): ?>active<?php endif; ?> text-center">
            <i class="fa fa-address-card-o fa-3x " aria-hidden="true"></i>
            <p>Datos de Facturación</p>
        </a>
        <a href="#" class="list-group-item <?php if ($active == 2): ?>active<?php endif; ?> text-center">
            <i class="fa fa-credit-card fa-3x " aria-hidden="true"></i>
            <p>Formas de Pago</p>
        </a>
        <a href="#" class="list-group-item <?php if ($active == 3): ?>active<?php endif; ?> text-center">
            <i class="fa fa-info fa-3x" aria-hidden="true"></i>
            <p>Confirmación de Pago</p>
        </a>
    </div>
</div>