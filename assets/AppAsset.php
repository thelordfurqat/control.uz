<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/bootstrap.min.css',
        'theme/fonts/css/font-awesome.min.css',
        'theme/css/animate.min.css',
        'theme/css/custom.css',
        'theme/css/icheck/flat/green.css',
        'theme/css/editor/external/google-code-prettify/prettify.css',
        'theme/css/editor/index.css',
        'theme/css/select/select2.min.css',
        'theme/css/switchery/switchery.min.css',
//
        'theme/css/floatexamples.css',
        'theme/css/font-awesome.min.css',

        'theme/css/ion.rangeSlider.css',
        'theme/css/ion.rangeSlider.skinFlat.css',
        'theme/css/normalize.css',
        'theme/css/nprogress.css',

    ];
    public $js = [
//        'theme/js/bootstrap.min.js',
//        'theme/js/progressbar/bootstrap-progressbar.min.js',
//        'theme/js/nicescroll/jquery.nicescroll.min.js',
//        'theme/js/chartjs/chart.min.js',
//        'theme/js/custom.js',
////'theme/js/jquery.min.js',
//        'theme/js/moment.min.js',
//        'theme/js/moment.min2.js',
//        'theme/js/nprogress.js',
//        'theme/js/icheck/icheck.min.js'

    ];
    public $jsOptions=[
        'positions'=>View::POS_END,
    ];
    public $depends = [
        //'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
