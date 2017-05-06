<?php
class AudioManager { 
	private static $_instance = null;
	
	private $audioPaths = array();
	
	private function __construct(){
	}
	
	public static function getInstance() {
	
		if(is_null(self::$_instance)) {
			self::$_instance = new AudioManager();  
		}
		
		return self::$_instance;
	}
	
	public function getAudioStream($key){
		
		if(isset($this->audioPaths[$key]) && !empty($this->audioPaths[$key])){
			header("Content-Transfer-Encoding: binary"); 
			header('Content-Disposition: inline;filename="tryagain.mp3"');
			header('Content-type: audio/mpeg');
			header('Cache-Control: no-cache');
			readfile($this->audioPaths[$key]);
		}
	}
	public function getAudioPath($key){
		return $this->audioPaths[$key];
	}
	public function getAudioPaths(){
		return $this->audioPaths;
	}
	public function setAudioPath($key, $path){
		$this->audioPaths[$key] = $path;
	}
	public function setAudioPaths($audioPaths){
		$this->audioPaths = $audioPaths;
	}
}
?>