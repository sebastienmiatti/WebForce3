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
define('DB_NAME', 'labonnebouffe');

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
define('AUTH_KEY',         'SW.RLkj+phEs?S3R1QDH3[m>]~,+=g}%ga:B7Mf)JibNNUJMfDhlLSRAk)d?}y_F');
define('SECURE_AUTH_KEY',  'dZM5N7&~CjS(>[S^vQsa%+-<+l #IwU5k47*rK5b[ {:7$30lIyb)^2N_P~e:@j>');
define('LOGGED_IN_KEY',    'TUHi`)D8J{ r8QBKEn7zcpTm{^xhC &Pt|YapB(0A@rg?4vb@uY_0*.t2ZDq~_{K');
define('NONCE_KEY',        '))6=/}-$85yb$aP $gxZCyw+~q;mNww3q?t>U`nhQN<Uk*Z23|^N?ABi4>,5}wsK');
define('AUTH_SALT',        '5(KFV0]5.*Z%{4;ZDSo/ZNN:CUW6vV65 g}L(RPF(%[Rg$Z`joRc^7iiT*^:iTGr');
define('SECURE_AUTH_SALT', 'JU,2y>C:8cq=[Vj:%pj_fWtC>3kewP}A#foosRfW#rx4.+4&~Nh&08sU0YHF*fY*');
define('LOGGED_IN_SALT',   '@D -7nx?@0TbSQyV$M{CFG-g:RtG{FQBqgdW1wMJac*{3>(1<i%k}RQO|_7Rh;!F');
define('NONCE_SALT',       '_S=7yBnC1$n,)yl+adxr6)gXbVW:/z)<kCL{}Yj|b9QY|yRjpDkY> t#IFF~Z`!4');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'lbb_';

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