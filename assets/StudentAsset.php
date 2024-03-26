<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class StudentAsset extends AssetBundle
{
    public $_file = "files/src/temp.php";
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->sourcePath = __DIR__.'/../src';

    }
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/student.css',
    ];
    public $js = [
        'js/student.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
