<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$security = Yii::$app->getSecurity();

return [
    'username' => $faker->unique()->userName,
    'email' => $faker->unique()->email,
    'auth_key' => $security->generateRandomString(),
    'password_hash' => $security->generatePasswordHash('password_' . $index),
    'password_reset_token' => $security->generateRandomString() . '_' . time(),
    'created_at' => time(),
    'updated_at' => time(),
    'nick' => $faker->unique()->name,
    'head_image' => $faker->imageUrl(),
];
