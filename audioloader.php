<?php
session_start();

$id = $_GET['id'];

$playlist = array(	"mymusic"=>"Bill Withers - Ain't No Sunshine.mp3",
					"mymusic2"=>"Chuck Hall Band - Skank a Dank.mp3");
						
if(isset($id) && !empty($id) && isset($playlist[$id]) && !empty($playlist[$id])){
	
	require(dirname(__FILE__).'/AudioManager.class.php');
	
	$audioManager = AudioManager::getInstance();
	$audioManager->setAudioPaths($playlist);
	$audioManager->getAudioStream($id);
}
exit;
?>