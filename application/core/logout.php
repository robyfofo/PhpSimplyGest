<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/logout.php v.1.0.0. 13/02/2017
*/
/* Istanziamo l'oggetto */
$my_session = new my_session(SESSIONS_TIME, SESSIONS_GC_TIME,AD_SESSIONS_COOKIE_NAME);
/* Richiamiamo il metodo che distrugge la sessione */
$my_session->my_session_destroy();
/* Richiamiamo il metodo che pulire la tabella */
$my_session->my_session_gc();
/* cancello il cookie */
setcookie (AD_SESSIONS_COOKIE_NAME, "", time()-1);
setcookie (DATA_SESSIONS_COOKIE_NAME, "", time()-1);
ToolsStrings::redirect(URL_SITE);
?>