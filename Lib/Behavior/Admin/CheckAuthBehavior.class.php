<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alex
 * Date: 13-3-19
 * Time: 下午10:16
 * To change this template use File | Settings | File Templates.
 */

class CheckAuthBehavior extends Behavior{

    public function run(&$return) {
        return $return =false;
    }
}