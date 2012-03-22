<?php
/*
Plugin Name: WDO Guilds
Plugin URI: http://www.webdevsonline.com
Description: A simple plugin to allow your website to become a Guild website without subscription fees or advertising.
Version: 1.1.5
Author: Web Devs Online
Author URI: http://www.webdevsonline.com

For more information, email us at contact@webdevsonline.com.

Copyright 2012 Web Devs Online

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

function WDOGuilds(){

$pluginurl = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
echo '<link rel="stylesheet" type="text/css" href="'.$pluginurl.'WDOGuilds.css">';
}
add_action( 'wp_head', 'WDOGuilds' );

require_once dirname( __FILE__ ) . '/wdo-admin/wdo-admin.php';
require_once dirname( __FILE__ ) . '/wdo-admin/wdo-admin-user.php';

function list_members_guild() {

	global $wpdb;
	
	$result =  mysql_query("SELECT * FROM wdo_guilds_user");
	?>
	<script>function ReverseDisplay(d) {
if(document.getElementById(d).style.display === "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}</script>
<?php
			echo "<table id='memberstable'><tr>\n";
		echo "<td id='memberstitle'>Character Name</td><td id='memberstitle'>Character Level</td><td id='memberstitle'>Character Class</td></tr>\n";
		while ($guilduser = mysql_fetch_array($result)) {
		
		echo  "<tr><td><a href=\"javascript:ReverseDisplay('".$guilduser['CharacterName']."')\">" .$guilduser['CharacterName'] . "</a></td><td>" . $guilduser['CharacterLevel']  . "</td><td>" . $guilduser['CharacterClass'] . "</td></tr>\n";
		echo "<tr><td colspan='3'>";
		echo "<div id='".$guilduser['CharacterName']."' style='display:none;'>";
		echo "Alt Character: " . $guilduser['AltCharacters'];
		echo "<br />";
		echo "Character Bio: " . $guilduser['CharacterBio'];
		echo "</div";
		echo "</td></tr>";
		
	}
	echo "</table>";

}
 function guilduserinfo_shortcode($atts) 
{ 
	  echo list_members_guild();
}
add_shortcode("WDO-guilduserinfo","guilduserinfo_shortcode");

function disaplyguildinfo() {

	global $wpdb;
	
	$result =  mysql_query("SELECT * FROM wdo_guilds");
	
	while ($guildinfo = mysql_fetch_array($result)) {
		echo '<div>';
		echo '<br />';
		echo "<strong>Guild Name:</strong> " . $guildinfo['GuildName'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Main Game:</strong> " . $guildinfo['GuildMainGame'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Alternate Games (Clan):</strong> " . $guildinfo['GuildAltGames'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Leader:</strong> " . $guildinfo['GuildLeader'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Vice Leader:</strong> " . $guildinfo['GuildViceLeader'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Members (total):</strong> " . $guildinfo['GuildMembers'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Rules:</strong> " . $guildinfo['GuildRules'] .'<br />';
		echo '<br />';
		echo "<strong>Guild News:</strong> " . $guildinfo['GuildNews'] .'<br />';
		echo '</div>';
		echo '</td></tr></table>';
	}

}
 function guildinfo_shortcode($atts) 
{ 
	  echo disaplyguildinfo();
}
add_shortcode("WDO-guildinfo","guildinfo_shortcode");

	
?>