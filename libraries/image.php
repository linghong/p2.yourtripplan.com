<?php

class Image {
	
	protected $image;
	protected $switch;
	protected $height;
	protected $mimetype;

	public function __construct(){
		# Read the image file to a binary buffer
		$fp = fopen($filename, 'rb') or die("Image '$filename' not found!");
		$buf = '';
		while(!feof($fp))
			$buf .=fgets($fp, 4096);

		#Create image and asign it to the image property
		$this->image = imagecreatefromstring($buf);

		#Extract image information storing in the class attributes
		$info  			= getimagesize($filename);
		$this->width 	= $info[0];
		$this->height 	= $info[1];
		$this->mimetype = $info['mime'];

	}

    public function display(){
    	header("Content-type: {$this->mimetype}");
    	switch($this->mimetype) {
    		case 'image/jpeg': imagejpeg($this->image); break;
    		case 'image/png': imagepng($this->image); break;
    		case 'image/gif': imagegif($this->image); break;
    	}
	
    }

	public function resize(){
		$thumb = imagecreatetruecolor($width, $this->image); break;
		imagecopyresample($thumb,$this->image); break;
		$this->image = $thumb;

	}
}