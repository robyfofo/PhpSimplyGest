<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/core/logout.php v.1.0.0. 02/07/2018
*/
/* Istanziamo l'oggetto */
$my_session = new my_session(SESSIONS_TIME, SESSIONS_GC_TIME,SESSIONS_COOKIE_NAME);
/* Richiamiamo il metodo che distrugge la sessione */
$my_session->my_session_destroy();
/* Richiamiamo il metodo che pulire la tabella */
$my_session->my_session_gc();
/* cancello il cookie */
unset($_COOKIE[SESSIONS_COOKIE_NAME]);
setcookie (SESSIONS_COOKIE_NAME,'', time()-3600,'/');
ToolsStrings::redirect(URL_SITE);
?>