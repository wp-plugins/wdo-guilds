<?php

if ($memberlist['meta_value'] == 0){
$userlevel = 'Subscriber';
}
if ($memberlist['meta_value'] == 1){
$userlevel = 'Contributor';
}
if ($memberlist['meta_value'] == 2 || $memberlist['meta_value'] == 3 || $memberlist['meta_value'] == 4){
$userlevel = 'Author';
}
if ($memberlist['meta_value'] == 5 || $memberlist['meta_value'] == 6 || $memberlist['meta_value'] == 7){
$userlevel = 'Editor';
}
if ($memberlist['meta_value'] == 8 || $memberlist['meta_value'] == 9 || $memberlist['meta_value'] == '10'){
$userlevel = 'Administrator';
}

?>