<?php

class File extends Controller{
	protected function Index(){
		$viewmodel = new FileModel();
		$this->returnView($viewmodel->Index(), true);
	}
}

?>