<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\db\Query;
use yii\helpers\VarDumper;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        $rows = (new Query)
            ->select([
                'Nname as name',
                'NSet as card_set_id',
                'Ntype as card_type_id',
                'Nrarity as rarity',
                'Nmanacost as manacost',
                'Nconverted_manacost as converted_manacost',
                'Nability as ability',
                'Ncolor as color'
            ])
            ->from('Ncards')
            ->all();

        $f = fopen('cards.php', 'w+');
        fwrite($f, VarDumper::dumpAsString($rows));
        fclose($f);
        VarDumper::dump($rows);
    }
}
