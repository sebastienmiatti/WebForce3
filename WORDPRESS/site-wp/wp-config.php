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
define('DB_NAME', 'site-wp');

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
define('AUTH_KEY',         'sN h4}g{YhMNTm]1c5mA}5R`E<AU-S b=u*km$2I dmU $nvDmgh4:0u.!IX -S&');
define('SECURE_AUTH_KEY',  '8wa`gO*(/8jWc3%}z}uAp/Yp[IrkS!2.2O?U?Um:lU#(@.SdE]a0Ki9Fz*:OVdrU');
define('LOGGED_IN_KEY',    ' v-IyWX` #[a6AoGkxg(/9,Z2glWGnRpASmfa^1F?^;0-p`!{O$.=v7ll^=4#^7[');
define('NONCE_KEY',        'X3A]Gn({*RZ`r.N}`K~_wa|@~)q+}zuO`.c4U;-yH=}p/(M`jx`8auL*<o1fJJPO');
define('AUTH_SALT',        'g.[JVNB,XSO/MF zNgH{)X,*CYh@y;q[z3gh}%EAZnUR0L%;A8_7l-`_fki-z4=!');
define('SECURE_AUTH_SALT', 'X0*#zC48Q,$gkS58r@WXy;*f9W334}O_$wP[=98<%`~E~rW~hm{egmAp@{5^UB=~');
define('LOGGED_IN_SALT',   ' zmTx3:/2_-DCe!0JVj[GC#.B@rbm+5*?N3IG~k]SIAU)l s66~cH9=NB/mT:<p;');
define('NONCE_SALT',       '-!7YOE9uUM0G_x{U>+MsaXeu}7EiH&67@H{9~#N*$dcK|2;I8-[MmGUqG-2=KiQ3');
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