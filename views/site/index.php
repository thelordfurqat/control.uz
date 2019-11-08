<div class="row tile_count">
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-laptop"></i> Jihozlar</span>
            <div class="count"><?=sizeof($jihozs)?> ta</div>
            <span class=""><i class="green"><?=sizeof($modells)?> </i> turdagi Modelda</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-desktop"></i> Modellar</span>
            <div class="count"><?=sizeof($modells)?> ta</div>
            <span class=""><i class="green"><?=sizeof($qurilmas)?></i> turdagi Qurilmada</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-gear"></i> Qurilmalar</span>
            <div class="count green"><?=sizeof($qurilmas)?> ta</div>
            <span class="count_bottom"><i class="green"><?=sizeof($qismqurilmas)?></i> ta qismlar bilan</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-users"></i> Xodimlar</span>
            <div class="count"><?=sizeof($stuffs)?> ta</div>
            <span class="">Jihozlarga biriktirilgan</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-home"></i> Xonalar</span>
            <div class="count"><?=sizeof($rooms)?> ta</div>
            <span class="count_bottom"> Jihozlar joylashgan</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Foydalanuvchilar</span>
            <div class="count"><?=sizeof(\app\models\User::find()->all())?> ta</div>
            <span class="count_bottom"><i class="green"> Barcha imkoniyatlar bilan</i> </span>
        </div>
    </div>
    <div class="map" style="margin-top: 150px">
        <div class="container">
            <h3 class="title ">Xaritada<span></span></h3>
            <iframe src="https://maps.google.com/maps?q=tuit%20urgench%20branch&t=&z=13&ie=UTF8&iwloc=&output=embed" style="
                z-index: 3;
    position: relative;
    height: 100%;
    width: 100%;
    padding: 0px;
    /*border-width: 0px;*/
    margin: 0px;
    left: 0px;
    top: 0px;
    touch-action: pan-x pan-y;
            border:0"></iframe>
            <br>
            <br>
            <br>
            <div class="contact-grids">
                <div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
                    <div class="contact-grid1">
                        <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p>Al-Xorazmiy 110, Airaport yo'li<span> Urganch shaxar</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
                    <div class="contact-grid1">
                        <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                        <h4>Raqamlarimiz</h4>
                        <p>+998999999919<span> +998942345665</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
                    <div class="contact-grid1">
                        <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:info@tuit.com">info@tuit.com</a></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
