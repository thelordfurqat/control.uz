<div class="main_container" >

    <!-- page content -->
    <div class="col-md-12" style="background-color: #0b3e6f; height: 500px; border-radius: 50px; ">
        <div class="col-middle">
            <div class="text-center text-center">
                <h1 class="error-number">Natija topilmadi</h1>
                <h2>Kechirasiz siz qidirayotgan "<?=$data?>" bo'yicha hech narsa topilmadi</h2>
                <div class="mid_center">
                    <h3>Search</h3>
<!--                    <form>-->
                        <div class="col-xs-12 form-group pull-right top_search">
                            <?php \yii\widgets\ActiveForm::begin(['method'=>'get','action'=>Yii::$app->urlManager->createUrl(['site/findall'])])?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="data" placeholder="Search for...">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" >Go!</button>
                        </span>
                            </div>
                            <?php \yii\widgets\ActiveForm::end()?>
                        </div>
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

</div>