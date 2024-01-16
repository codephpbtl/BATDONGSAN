<?php

class News extends Controller{
	protected function Index(){
		$viewmodel = new NewsModel();
		$this->returnView($viewmodel->Index(), true);
	}
}

?>