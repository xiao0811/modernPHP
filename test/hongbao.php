<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/6/2
 * Time: 下午10:30
 */

class Hongbao
{
    static public function get($totle, $numbers, $flu = 0.9)
    {
        $every = $totle / $numbers;
        $hongbaos = [];
        $shengxia = $totle;
        $min = $every * (1 - $flu);
        $max = $every * (1 + $flu);
        for ($i = 0; $i < $numbers - 1; $i++) {
            $hongbaos[$i] = rand($min * 100, $max * 100)  / 100;
            $shengxia -= $hongbaos[$i];
        }

        $hongbaos[$i] = $shengxia;

        return $hongbaos;
    }
}

echo "<pre>";
var_dump(Hongbao::get(10, 20));
echo "</pre>";