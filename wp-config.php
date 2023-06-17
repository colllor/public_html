<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', '1825-20_84860' );

/** Имя пользователя базы данных */
define( 'DB_USER', '1825-20_84860' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '46d31f145307f9f70846' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/2h]Q&_FO`mx~T{Ge]`[X`PArGI;W mGkeyYn7$m[nSDxjPrfiHlu(tt:,*@GH3W' );
define( 'SECURE_AUTH_KEY',  'v9=Onyn/t4QXG6vd(BkG$I bTvP[RUa!4z$+=R?W2VxLeMB}AVsgv.a&J>ob=psa' );
define( 'LOGGED_IN_KEY',    'sLtBU?>GRE-8bOn<6Y;yb~BF{$q0=d=1@>p2FEEGQ?8E%$HAT1X&sioYByZlu0;/' );
define( 'NONCE_KEY',        '^/w3!^BsW+xJ~U6~r/16qUT=smwu1-fd4^WJlQB n4<TDE9-0^22F1?(zu}v<1]M' );
define( 'AUTH_SALT',        'Bwi$S]MM&#.&ILAo7~igcfgnl(+#o%Q2#n;p,(74v[C:ZXu]0S2bT*y09!Wqb`9=' );
define( 'SECURE_AUTH_SALT', '4(Xnb@~,B:ao9d>FA:pok8 [J@<5{M$GFzZTqVI@M#!-}n1EMLhcY6bck|-qQ?[A' );
define( 'LOGGED_IN_SALT',   '`fvgT7qWww <9n7q~AGCs_I45:#ALe,OB=FeVK_t.SYq_OrhawJ0om(>,i+G)2qN' );
define( 'NONCE_SALT',       '=?b]zQht%}!}#J`Ccaq~#|@C[_*!$,jJv^g_rXA1 M34Sci4XO| 0a98|<[anYip' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = '81M8U_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';