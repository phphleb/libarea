<?php
/**
 * @author  Foma Tuturov <fomiash@yandex.ru>
 */

// All calls are sent to this file.
// Все вызовы направляются в этот файл.

define('HLEB_START', microtime(true));
define('HLEB_FRAME_VERSION', "1.5.57");
define('HLEB_PUBLIC_DIR', __DIR__);
define('TEMPLATE_DIR', realpath(__DIR__ . '/../resources/views/'));

// Загружаем файл конфигурации
$GLOBALS['conf'] = include( __DIR__ .'/../config.inc.php');

// General headers.
// Общие заголовки.
// Content Security Policy (ВКЛЮЧИТЬ в производстве)
// header("Content-Security-Policy: script-src 'self'; style-src 'self';");
header("Referrer-Policy: no-referrer-when-downgrade");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
// ...

// Initialization.
// Инициализация.
require __DIR__ . '/../vendor/phphleb/framework/bootstrap.php';

exit();


