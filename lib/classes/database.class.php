<?php
	/*-------------------------------------------------------------------------------
		Serenity - "Serene PHP made easy."

		Developer: Patrick Stephens
		Email: pstephens2601@gmail.com
		Github Repository: https://github.com/pstephens2601/Serenity
		Creation Date: 8-20-2013
		Last Edit Date: 3-21-2014

		Class Notes - Built on top of the mysqli class the database class handles 
		interaction with the database.  A database object is created in the 
		constructor of every model and can be accessed from within the model class 
		using $this->db.
	---------------------------------------------------------------------------------*/
	
	class database extends mysqli
	{

		function __construct($host, $user, $pass, $db)
		{
			
			parent::__construct($host, $user, $pass, $db);

			if (mysqli_connect_error())
			{
				//provides detailed error information in the development environment.
				if (ENVIRONMENT == 'development')
				{
					die('Serene Error (Stay Calm!): Database Connection Error -> Class [' . get_class($this) . '] has experienced the following error: ' . mysqli_connect_error());
				}
				else
				{
					die(PRODUCTION_ERROR_MESSAGE);
				}
			}
			else {
				return true;
			}
		}

		function mojo_query($query)
		{
			if($query_result = $this->query($this->real_escape_string($query)))
			{
				if (func_num_args() > 1)
				{

				}
			}
			else
			{
				echo "Serene Error (Stay Calm!): Database query error for: $query. <br>";
				die($this->error);
			}
		}

	}
?>