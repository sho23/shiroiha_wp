<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'shiroihadb');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'wordpress');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'wordpress');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i^qo}J<%#_C8-~([P+SYLB/O5VmUUB6a+j3b~IDoMP=sL[w:YQnxsgyx,}Z^|qX{');
define('SECURE_AUTH_KEY',  '(4)i*.tj@Km}wW`H&})-]hMFk9tXk{2*%+V`OkY9f8c 6pZdMJ?P7,c6Ns+(8@Qg');
define('LOGGED_IN_KEY',    'R+?${4MK[GRCg)qq~3T}&VH))4k=u`4ku/|Ffkti?27zvs:5:v2!ST@p+P`QETQX');
define('NONCE_KEY',        '|l<`rCM_(V&ZdzYe:o_WI>w>~gdo]Ob@D/X,O:D3DTB}S4S|LIw;@d.EQ6?m60p*');
define('AUTH_SALT',        '|A9!gx#fC1<Kj|VVXKeaB?AzA.ts;8sTd()P[H/9fXr|Y<MQ7hPSW]HA@j,f{@=#');
define('SECURE_AUTH_SALT', 'pXR!rVtIuojFl`6vMb[8Q*U3_G$e!~)B3?n$Ded8,rt[AiP66{ip6,_bE}Yk30(k');
define('LOGGED_IN_SALT',   'cL7TqCLJWBLQFb:E>8l?u8on$ymiO6LFLfv[m>8&]CcO3|{N7He+p#!L=~t7d2Y#');
define('NONCE_SALT',       'yYaVbr/Pk<scL20G=-`Wv&3EUW;jh46Ej:HSp.[`@KcXM+x?t_lyRwQR?A+Yps`.');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
