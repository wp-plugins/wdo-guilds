<script type='text/javascript'>
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>

<?php
		 
function form1(){
		$sql4 = 'Select * from wdo_guilds';
		$exist4 = mysql_query($sql4);
		if(!empty($exist4)) {
		$display2 = mysql_fetch_array($exist4);
		}
	echo '<br />';
	echo '<form action="admin.php?page=wdo-guilds" method="post">
		 <strong>Guild Name:</strong> <input type="text" name="guildname" maxlength="255" value="'.$display2['GuildName'].'"/><br />
		 <br />
		 <strong>Guild Main Game:</strong> <input type="text" name="guildgame" maxlength="255" value="'.$display2['GuildMainGame'].'"/><br />
		 <br />
		 <strong>Guild Alternate Games (Clan):</strong> <input type="text" name="guildaltgame" maxlength="255" value="'.$display2['GuildAltGames'].'"/><br />
		 <br />
		 <strong>Guild Leader:</strong> <input type="text" name="guildleader" maxlength="255" value="'.$display2['GuildLeader'].'"/><br />
		 <br />
		 <strong>Guild Vice Leader:</strong> <input type="text" name="guildvice" maxlength="255" /value="'.$display2['GuildViceLeader'].'"><br />
		 <br />
		 <strong>Guild Members (total):</strong> <input type="text" name="guildmembers"  id="guildmembers" maxlength="11" value="'.$display2['GuildMembers'].'" onBlur="isNumeric(document.getElementById(\'guildmembers\'), \'Guild Members (total): Numbers Only Please\')"/><br />
		 <br />
		 <label><span><strong>Guild Rules:</strong></span> <textarea id="wdotextarea" name="guildrules"></textarea></label><br />
		 <br />
		 <label><span><strong>Guild News:</strong></span> <textarea id="wdotextarea" name="guildnews"></textarea></label><br />
		 <br />
		<input type="submit" name="updateguild" value="Update"/>
		 </form>';
		 }
		 
function form2(){
		global $current_user;
    	get_currentuserinfo();
		
		$loggedas = $current_user->user_login;
		
		$sql5 = 'Select * from wdo_guilds_user where Username="'.$loggedas.'"';
		$exist5 = mysql_query($sql5);
		if(!empty($exist5)) {
		$display3 = mysql_fetch_array($exist5);
		}
		 echo '<form action="admin.php?page=wdo-guilds-user" method="post">';
		 echo ' <br />
		 <strong>Character Name:</strong><input type="text" name="charactername" maxlength="255" value="'.$display3['CharacterName'].'"/><br />
		 <br />
		 <strong>Character Level:</strong><input type="text" name="characterlevel" id="characterlevel" maxlength="255" value="'.$display3['CharacterLevel'].'" onBlur="isNumeric(document.getElementById(\'characterlevel\'), \'Character Level: Numbers Only Please\')"/><br />
		 <br />
		 <strong>Character Class:</strong><input type="text" name="characterclass" maxlength="255" value="'.$display3['CharacterClass'].'"/><br />
		 <br />
		 <strong>Alt Character Names:</strong><input type="text" name="altcharacters" maxlength="255" value="'.$display3['AltCharacters'].'"/><br />
		<br />
		 <label><span><strong>Character Bio:</strong></span> <textarea id="wdotextarea" name="characterbio"></textarea></label><br />
		 <br />
		<input type="submit" name="updateguild" value="Update"/>
		 </form>';
}


function layout(){
		$sql3 = 'Select * from wdo_guilds';
		$exist3 = mysql_query($sql3);
		if(!empty($exist3)) {
		$display = mysql_fetch_array($exist3);
		}
		echo '<td valign="top" width="320">';
		echo '<div style="padding-left:15px;">';
		echo '<br />';
		echo "<strong>Guild Name:</strong> " . $display['GuildName'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Main Game:</strong> " . $display['GuildMainGame'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Alternate Games (Clan):</strong> " . $display['GuildAltGames'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Leader:</strong> " . $display['GuildLeader'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Vice Leader:</strong> " . $display['GuildViceLeader'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Members (total):</strong> " . $display['GuildMembers'] .'<br />';
		echo '<br />';
		echo "<strong>Guild Rules:</strong> " . $display['GuildRules'] .'<br />';
		echo '<br />';
		echo "<strong>Guild News:</strong> " . $display['GuildNews'] .'<br />';
		echo '</div>';
		echo '</td></tr></table>';
		}
function layout2(){
		global $current_user;
    	get_currentuserinfo();
		
		$loggedas = $current_user->user_login;
		
		$sql5 = 'Select * from wdo_guilds_user where Username="'.$loggedas.'"';
		$exist5 = mysql_query($sql5);
		if(!empty($exist5)) {
		$display3 = mysql_fetch_array($exist5);
		}
		echo '<td valign="top" width="320">';
		echo '<div style="padding-left:15px;">';
		echo '<br />';
		echo "<strong>Character Name: </strong> " . $display3['CharacterName'] .'<br />';
		echo '<br />';
		echo "<strong>Character Level: </strong> " . $display3['CharacterLevel'] .'<br />';
		echo '<br />';
		echo "<strong>Character Class: </strong> " . $display3['CharacterClass'] .'<br />';
		echo '<br />';
		echo "<strong>Alt Character Name: </strong> " . $display3['AltCharacters'] .'<br />';
		echo '<br />';
		echo "<strong>Character Bio: </strong> " . $display3['CharacterBio'] .'<br />';
		echo '</div>';
		echo '</td></tr></table>';
		}
?>