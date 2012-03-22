<?php
add_action('admin_menu', 'WDO_Guilds_user');

function WDO_Guilds_user() {
add_submenu_page('wdo-guilds','WDO Guilds User', 'WDO Guilds User', 'read', 'wdo-guilds-user', 'WDO_Guilds_admin_user');
}

function wdo_admin_css($hook_suffix) {


			echo  "<link type='text/css' rel='stylesheet' href='" . plugins_url('WDOGuildsadmin.css', __FILE__) . "' />";

	}
	
	add_action('admin_enqueue_scripts', 'wdo_admin_css');

function WDO_Guilds_admin_user() {
	echo '<div id="WDOguilds">';
    echo '<div id="WDOheader"><br /></div>';
	echo '<div id="WDOtitle">WDO Guilds User Setup</div>';
	echo '</div>';
	
	echo '<div id="WDOmain">Welcome to your user set up. In addition to the standard wordpress information here you can add details about your character.<br />
	<br />';
	
	echo 'Fill out the sections below. Administrators can display the information on a page on your website using [WDO-guilduserinfo]</div>';
	
	require_once dirname( __FILE__ ) . '/form-guild.php';
	
	global $current_user;
    get_currentuserinfo();
	
	$charactername = $_POST['charactername'];
	$characterlevel = $_POST['characterlevel'];
	$characterclass = $_POST['characterclass'];
	$characterbio = $_POST['characterbio'];
	$altcharacters = $_POST['altcharacters'];
	
	$loggedas = $current_user->user_login;
	
	$sql2 = 'SELECT CharacterName FROM wdo_guilds_user WHERE username="'.$loggedas.'"';
	$exist2 = mysql_query($sql2);
	
	if(!empty($exist2)) {
	$test = mysql_fetch_array($exist2);
	}
	
	$characterbioStore = nl2br(htmlentities($characterbio, ENT_QUOTES, 'UTF-8'));

    echo 'Currently logged in as: ' . $loggedas . "\n";
	
	if (empty($test)){
	if (!empty($charactername)) {
	$insert = "INSERT INTO wdo_guilds_user (Username, CharacterName, CharacterLevel, CharacterClass, CharacterBio, AltCharacters) VALUES ('$loggedas','$charactername', '$characterlevel', '$characterclass', '$characterbioStore' , '$altcharacters')";
	$pvnt = mysql_real_escape_string($insert);
	$run3 = mysql_query($insert);
	}
	}
	else if (!empty($test)){
	if (!empty($charactername)) {
	$insert = "UPDATE wdo_guilds_user SET CharacterName='$charactername', CharacterLevel='$characterlevel', CharacterClass='$characterclass', CharacterBio='$characterbioStore', AltCharacters='$altcharacters' WHERE Username='$loggedas'";
	$pvnt = mysql_real_escape_string($insert);
	$run3 = mysql_query($insert);
	}
	}
	
	echo '<table><tr><td>';
	form2();

	echo '</td>';
	layout2();
}
?>