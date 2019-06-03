<?php

try {
    $redis = new Redis();
    $redis->connect('redis');
} catch (\Exception $e) {
    die($e->getMessage());
}

$redis->hset('test', 'age', 40);

$all_keys = $redis->keys('*');
echo '<pre>';
print_r($all_keys);
echo '</pre>';

echo $redis->hget('test', 'age');

echo '<hr>';
