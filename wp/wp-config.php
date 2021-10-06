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
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'rgb_10' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'rgb2021' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'rgb_mysql' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '&(3xKj5IVMaJOR|m2}D]xdk:_R.idZ{H-Fl9 _NPvNcfO?<acYS9UT:J|@^ .E#[');
	define('SECURE_AUTH_KEY',  'kCuf+1oeVXo| FIA #{9q3Z@l8|?3a)ig$w(x_Vjt)H8GU5hd`g)!sM4rb@_G=K+');
	define('LOGGED_IN_KEY',    'L*Qe0:}wO)sK0 tQOCjIm#vNp}&Ds(Y4RLZb%#{B@JNEZ{biw!qxBhK9qKE+8t6t');
	define('NONCE_KEY',        'aM79JpV)tX#dL#OxY&P|ng$Q5|/${x:&W4?mP30hNet}|jfW&B|I=n `{q<Ll.?s');
	define('AUTH_SALT',        'Mj`2N-7oj;-d B_YQ<5 4e*o<,$Vb1X^|q,}PXIy`R Q&8_.j+7G[caU^+u@B%yE');
	define('SECURE_AUTH_SALT', '$a%eP@{j+M5FT(BZf,L^h2y,0E^1Q^-gG%(YT|IIX][rOb/N~.> 4dY6>K.JzmQg');
	define('LOGGED_IN_SALT',   '}G(*6T4@p-*Pn{-|Ek# fP`c [%Ph+|V&fGqSw (j|}H?Qq|. =~SG,a0SKssi[G');
	define('NONCE_SALT',       'mkY84~Jn:F9Po|-.1Tb}[%ra~OenqryQcA{%KecEIaO?~_-1BshHk_uFp^|3</t2');
/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
