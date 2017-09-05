<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'babar');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#/tml`b/#^@0N;X7|NA lGOcfgfjnw=Wv%Tle%Nxr|7@d3jv`UEoP /w24/[{.Q:');
define('SECURE_AUTH_KEY',  '(n&tu 81W>)CR /0+}rS+{V635Kyad,mCQW4?}?6x%@6rfg&DjTq.mu:Xw[[%bdO');
define('LOGGED_IN_KEY',    '?yyCc>*9CbL+w.QNGcC# [D}`(&Ox&Qt$=JM1MOtvHHBE$B+HLW/rjP]k.,&- 1A');
define('NONCE_KEY',        '6*BC(Eh3ofIp/oypTVEl2Bd%gxpifdKnXn (3{xgOZawSM,x*64RCUO^M-Pa7CSU');
define('AUTH_SALT',        '+COn()Q!-G2_2FdhP#Y, 9!#GcJ9AOF 5CbhoHXiG z&SI/wkt`{;O9ZRKq1<iR|');
define('SECURE_AUTH_SALT', 'J2,c_Lp%HrMP6v3TN_FK/HzoVatlo$c&PYI[dt*?}RW-oJfNW?4&N%D9p=]R{ar$');
define('LOGGED_IN_SALT',   'ADew$*]IA;]e5@qyDk&ZO79$ e?U_&=^dsvcs1Q*t`>P(,O*ctE(#ifyQGJ5[=M)');
define('NONCE_SALT',       'VP/zZr2$(7QR#%kd.S-+Au<@efQIrZlI6IK3LdC$MgF>UGD4%DP&hg&h^}gUFa]E');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');