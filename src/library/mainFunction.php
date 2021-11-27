<?php
/**
 * Функция отладки. Останавливает работу програамы выводя значение переменной
 * $value
 *
 * @param variant $value переменная для вывода ее на страницу
 */
function d($value = null, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}
