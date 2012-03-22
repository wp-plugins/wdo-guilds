<?php
add_action('admin_menu', 'WDO_Guilds');

function WDO_Guilds() {
    add_menu_page('WDO Guilds', 'WDO Guilds', 'manage_options', 'wdo-guilds', 'WDO_Guilds_admin');
}

function myposttype_admin_css($hook_suffix) {


			echo  "<link type='text/css' rel='stylesheet' href='" . plugins_url('WDOGuildsadmin.css', __FILE__) . "' />";

	}
	
	add_action('admin_enqueue_scripts', 'myposttype_admin_css');

function WDO_Guilds_admin() {
	
	echo '<div id="WDOguilds">';
    echo '<div id="WDOheader"><br /></div>';
	echo '<div id="WDOtitle">WDO Guilds Setup and Configuration</div>';
	echo '</div>';
	echo '<div id="WDOmain">Welcome to the WDO Guild plugin, this section is for the set up and configuration of your guild. Alterations of this section are resitricted to Administrators.<br />
	<br />';
	
	echo 'Fill out the sections below, and display the information on a page on your website using 		[WDO-guildinfo]</div>';
	
	$update = $_POST['update1'];
	
	$guildname = $_POST['guildname'];
	$guildgame = $_POST['guildgame'];
	$guildaltgame = $_POST['guildaltgame'];
	$guildleader = $_POST['guildleader'];
	$guildvice = $_POST['guildvice'];
	$guildmembers = $_POST['guildmembers'];
	$guildrules = $_POST['guildrules'];
	$guildnews = $_POST['guildnews'];
	
	require_once dirname( __FILE__ ) . '/form-guild.php';
	
	$sql2 = 'Select GuildName from wdo_guilds';
	$exist2 = mysql_query($sql2);
	if(!empty($exist2)) {
	$test = mysql_fetch_array($exist2);
	}
	
	if (empty($update)){
	$sql = 'Select * from wdo_guilds';
	$exist = mysql_query($sql);
	if (empty($exist)){
	echo '<br />';
	echo 'Database needs updating, update now? You must update to proceed.';
	echo '<br />';
	echo '<form action="admin.php?page=wdo-guilds" method="post">
		  <input type="hidden" name="update1" value="update" />
		  <input type="submit" name="update2" value="Update" />
		  </form>';
	echo '<br />';
	}
	else {
	echo '<br />';
	echo 'Databases are up to date.';
	echo '<br />';
	}
	}
	else if (!empty($update)) {
	$db = 'CREATE TABLE IF NOT EXISTS wdo_guilds (G_ID Int NOT NULL AUTO_INCREMENT, GuildName varchar(255), GuildMainGame varchar(255), GuildAltGames varchar(255), GuildMembers Int, GuildRules Text, GuildNews Text, GuildLeader varchar(255), GuildViceLeader varchar(255), PRIMARY KEY (G_ID))';
	$run = mysql_query($db);
	$db2 = 'CREATE TABLE IF NOT EXISTS wdo_guilds_user (G_user_ID Int NOT NULL AUTO_INCREMENT, Username varchar(255), CharacterName varchar(255), CharacterLevel Int, CharacterClass varchar(255), CharacterBio Text,  AltCharacters varchar(255), PRIMARY KEY (G_user_ID))';
	$run2 = mysql_query($db2);
	echo '<br />';
	echo 'Databases are up to date.';
	echo '<br />';
	}
	
	$guildrulesStore = nl2br(htmlentities($guildrules, ENT_QUOTES, 'UTF-8'));
	$guildnewsStore = nl2br(htmlentities($guildnews, ENT_QUOTES, 'UTF-8'));

	
	if (empty($test)){
	if (!empty($guildname)) {
	$insert = "INSERT INTO wdo_guilds (GuildName, GuildMainGame, GuildAltGames, GuildMembers, GuildRules, GuildNews, GuildLeader, GuildViceLeader) VALUES ('$guildname', '$guildgame', '$guildaltgame', '$guildmembers' , '$guildrulesStore', '$guildnewsStore', '$guildleader', '$guildvice')";
	$pvnt = mysql_real_escape_string($insert);
	$run3 = mysql_query($insert);
	}
	}
	else if (!empty($test)){
	if (!empty($guildname)) {
	$insert = "UPDATE wdo_guilds SET GuildName='$guildname', GuildMainGame='$guildgame', GuildAltGames='$guildaltgame', GuildMembers='$guildmembers', GuildRules='$guildrulesStore', GuildNews='$guildnewsStore', GuildLeader='$guildleader', GuildViceLeader='$guildvice' WHERE GuildName='$guildname'";
	$pvnt = mysql_real_escape_string($insert);
	$run3 = mysql_query($insert);
	}
	}
	
	echo '<table><tr><td>';
	form1();

	echo '</td>';
	layout();
	}

?>