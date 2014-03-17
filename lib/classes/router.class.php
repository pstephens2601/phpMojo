<?php

	/*-----------------------------------------------------------------------------------------------
		Serinity - "Serene PHP made easy."
		
		The router handles reroute requests that are set in config/routes.php.
	------------------------------------------------------------------------------------------------*/

	class router extends serene_object
	{

	private $path_url;
	private $path_view;
	private $action;
	private $controller;
	private $root_controller;
	private $root_action;

	function root_to($view)
	{
		if (strpos($view, '#') > 0)
		{
			$path = explode('#', $view);
			$this->root_controller = $path[0];
			$this->root_action = $path[1];
			define("ROOT_PATH", serialize(array($this->root_controller, $this->root_action)));
		}
		else
		{
			define("ROOT_PATH", 'app/views/pages/' . $view . '.php');
		}
	}



	}

?>