<!--*********//////////////wrapper header-up//////////////*********-->
<div class="wrapper ">

    <!--*********//////////////navbar-wrapper//////////////*********-->

    <!-- Carousel
    ================================================== -->
    <div class="slider_fijo">
        <div class="container_menu">
            <div class="subtitulo">
                <span class="tam30  colblanco famavant">VIDEOS </span> <br>
                INICIO &nbsp; / &nbsp; EMPRESA &nbsp; / &nbsp; ACERCA DE KOHLER &nbsp; / &nbsp; CONSERVACIÓN DEL AGUA
                &nbsp; / &nbsp;PRODUCTOS &nbsp; / &nbsp;NOTICIAS &nbsp; / &nbsp;VIDEOS
            </div>
        </div>
    </div>
    <!-- Carousel
    ================================================== -->

    <div class="clearfix"></div>
</div>
<!--*********//////////////wrapper header-up//////////////*********-->


<!--****************************NEGRO****************************-->
<div class="wrapper  ">

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <style>
        .mov_menu {
            margin-top: -17% !important;
        }
    </style>


    <div c lang="clear"></div>

</div>
<div class="clear"></div>

<div class="wrapper  ">
    <div class="container_menu">
        <br><br>
        <div class="tam25 colnegro  famavant bg_blanco">VIDEOS</div>
        <div align="right">
            <div class="linea6 mov_linea">
                <div class="linea4"></div>
            </div>
        </div>
        <div class="clear">
            <div class="col-sm-3" align="justify">
                <br>
                <br>
                <form action="<?= \yii\helpers\Url::to(['videos']) ?>" method="get">
                    <input type="text" placeholder="Buscar..." class="txt_buscar" name="s">
                    <input type="submit" value="" class="btn_buscar2">
                </form>
                <br>
                <div class="colnegro tam16 famavant">CATEGORÍAS</div>
                <div class="linea4"></div>
                <br>
                <!--CATEGORIA--><br>


                <?= $this->render('widgets/menu2', ['modulo' => 'videos']) ?>

                <!--FIN CATEGORIAS-->

                <br><br>


            </div>
            <div class="col-sm-9" align="center"><br><br>
                <style>
                    .view .mask, .view .content {
                        width: 404px !important;
                        height: 192px !important
                    }
                </style>
                <div class="row">
                    <div class="col-xs-12">
                        <?php foreach ($model->getModels() as $item): ?>
                            <div class="col-sm-6">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?= $item ['url'] ?>"
                                            allowfullscreen></iframe>
                                </div>
                                <br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <br class="clearboth">
                <div class="row">
                    <div class="text-center">
                        <?= \yii\widgets\LinkPager::widget([
                            'pagination' => $model->pagination,
                        ]); ?>
                    </div>
                </div>
                <br><br>
            </div>

            <div class="clear"></div>
            <br><br><br><br>
        </div>

    </div>

</div>


