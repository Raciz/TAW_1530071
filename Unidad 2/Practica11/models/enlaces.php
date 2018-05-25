<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces)
    {
		if($enlaces == "index")
        {
			$module =  "views/modules/conversor.php";
		}
		
		return $module;

	}

}

?>