<?php


Class APIManager
{

	public function Init()
	{

		$uri = explode( "/", substr( $_SERVER['REQUEST_URI'], 1, strlen( $_SERVER['REQUEST_URI'])));

		# Comprobamos que con la ruta viene la versión de la API que utilizamos
		if ( ConfigClass::get("config.api_version") != $uri['0'])
		{

			return ( MessagesClass::Response( array(
	        'success' => false,
	        'type' => 'ERROR',
	        'code' => 'AUTH0001-' . CODE_ERROR,
	        'http_code' => 'HTTP/1.1 404  Not Found',
	        'message' => ConfigClass::get("messages.AUTH0001"),
	      )
	    ));

		}

    // ZONA DE VALIDACIONES NO IMPLEMENTAD PARA ESTA DEMO
    //
		// $auth = new Authorization();


    # Si la validacion del access_token es correcta pasamos a procesar los metodos de acceso a que que nos piden
    # Obtenemos el metodo que se utiliza para llamar a la API, solo soportamos GET, POST, PUT y DELETE
    $method = $_SERVER['REQUEST_METHOD'];

    if ( !in_array( $method, ConfigClass::get("config.methods")))
    {

      return ( MessagesClass::Response( array(
          'success' => false,
          'type' => 'ERROR',
          'code' => 'AUTH0002-' . CODE_ERROR,
          'http_code' => 'HTTP/1.1 405 Method Not Allowed',
          'message' => str_replace( "#", $method, ConfigClass::get("messages.AUTH0002")),
        )
      ));

    }

    $_route_query_string = explode( "/", $_SERVER['REQUEST_URI']);


    if ( $_route_query_string[2] == '')
    {
      return ( MessagesClass::Response( array(
          'success' => false,
          'type' => 'ERROR',
          'code' => 'RUTA0001-' . CODE_ERROR,
          'http_code' => 'HTTP/1.1 405 Method Not Allowed',
          'message' => str_replace( "#", $method, ConfigClass::get("messages.RUTA0001")),
        )
      ));
    }


    $_route = explode ( "/", ConfigClass::get("routes." . $method)[$_route_query_string[2]]);


    if ( empty( $_route[0]))
    {

      return ( MessagesClass::Response( array(
          'success' => false,
          'type' => 'ERROR',
          'code' => 'RUTA0002-' . CODE_ERROR,
          'http_code' => 'HTTP/1.1 405 Method Not Allowed',
          'message' => str_replace( "#", $method, ConfigClass::get("messages.RUTA0002")),
        )
      ));

    }

    $_class = ucwords( trim( $_route[0] . "Controller"));
    $_method = $_route[1];

    # Cargamos la clase (fichero) que vamos a utilizar dinamicamente
    $class_include = dirname( dirname(__FILE__))."/Controllers/".$_class.".php";


    if ( file_exists( $class_include))
    {

      require $class_include;


      switch ( $method)
      {

        case 'GET':

          if ( isset( $_route_query_string[3]))
          {
            $params = $_route_query_string[3];
          }
          else
          {
            $params = array();
          }

          $action = new $_class();
          $return = $action->{$_method} ( $params);

          break;

        case 'POST':

          //echo "El metodo es POST";
          break;

        case 'PUT':

          //echo "El metodo es PUT";
          break;

        case 'DELETE':

          //echo "El metodo es DELETE";
          break;

      }


    }
    else
    {

      return ( MessagesClass::Response( array(
          'success' => false,
          'type' => 'ERROR',
          'code' => 'RUTA0003-' . CODE_ERROR,
          'http_code' => 'HTTP/1.1 405 Method Not Allowed',
          'message' => str_replace( "#", $method, ConfigClass::get("messages.RUTA0003")),
        )
      ));


    }


    return( $return);

	}

}