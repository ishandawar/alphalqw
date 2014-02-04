<?php
error_reporting(0);

$msg['prot'] = '<login><bSuccess>0</bSuccess><sMsg><![CDATA[Your account has been disabled because of a violation of the Terms and Conditions. If you believe this is an error, please contact Staff as soon as possible.</a></u>]]></sMsg></login>';
$msg['bann'] = '<login><bSuccess>0</bSuccess><sMsg><![CDATA[Your account has been disabled because of a violation of the Terms and Conditions. If you believe this is an error, please contact Staff as soon as possible.</a></u>]]></sMsg></login>';
$msg['erro'] = '<login><bSuccess>0</bSuccess><sMsg><![CDATA[Please try again later. If you are seeing this messaage it means theres an problem that need to be fixed. Be patient]]></sMsg></login>';

/** Content Type is XML **/
header("Content-Type: text/xml");

$sql['host'] = 'localhost';
$sql['user'] = 'root';
$sql['pass'] = '';
$sql['name'] = 'eatl_db';

$con = mysqli_connect($sql['host'], $sql['user'], $sql['pass'], $sql['name']) or die($msg['erro']);
if(isset($_POST['strUsername'])) {
   $username = $con->real_escape_string(stripslashes($_POST['strUsername']));
   $password = md5($_POST['strPassword']);

   $ip = $_SERVER['REMOTE_ADDR'];

   $user_quer = $con->query('SELECT id,dUpgExp,iSendEmail,iAge,iUpg,iAccess,strEmail,iUpgDays FROM etl_users WHERE strUsername="'.$username.'" AND strPassword="'.$password.'" LIMIT 1');
   $user_info = $user_quer->fetch_assoc();
   $user_id = $user_info['id'];

   if ($user_quer->num_rows === 0) {
      print '<login bSuccess="0" sMsg="If you are seeing this, most likely you typed in your username or password wrong. If you see this screen after receiving a name change, most likely one of the Staff misspelled your new username. Please contact Staff as soon as possible."/>';
   } else {
      $chck_bann = $con->query('SELECT id,protection FROM etl_users_banned WHERE user_id='.$user_id.' AND active=1');
      if ($chck_bann->num_rows > 0) {
         $user_prot = $chck_bann->fetch_assoc();
         if($user_prot['protection'] === 1) {
            print $msg['prot'];
         } else {
            print $msg['bann'];
         }
      } else {
         $con->query('UPDATE etl_users SET login_ip='.$ip.' WHERE id='.$user_id);
         $upg_date = preg_replace('/\s+/', 'T', $user_info['dUpgExp']); 
         /** Login Data **/
         print '<login bSuccess="1" userid="'.$user_id.'" iAccess="'.$user_info['iAccess'].'" iUpg="'.$user_info['iUpg'].'" iAge="'.$user_info['iAge'].'" sToken="'.$password.'" dUpgExp="'.$upg_date.'" iUpgDays="'.$user_info['iUpgDays'].'" iSendEmail="'.$user_info['iSendEmail'].'" strEmail="'.$user_info['strEmail'].'" bCCOnly="0">';
         /** List Servers **/
         $server_info_list = $con->query("SELECT * FROM etl_servers LIMIT 10");
         while ($server_info = $server_info_list->fetch_assoc()) {
            print '<servers sName="'. $server_info['sName'] .'" sIP="'. $server_info['sIP'] .'" iCount="'. $server_info['iCount'] .'" iMax="'. $server_info['iMax'] .'" bOnline="'. $server_info['bOnline'] .'" iChat="'. $server_info['iChat'] .'" bUpg="'. $server_info['bUpg'] .'" sLang="'. $server_info['sLang'] .'" />';
         }
         print '</login>';
         
      }
   }
} else {
   print '<login bSuccess="0" sMsg="Invalid Input"/>';
}
#0.0274
#0.0273
#0.0272
?>
