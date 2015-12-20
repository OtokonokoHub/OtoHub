<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$security = Yii::$app->getSecurity();

return [
    'status' => $faker->randomElement([-1, 0, 1]),
];
