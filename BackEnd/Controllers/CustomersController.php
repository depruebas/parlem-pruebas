<?php

include dirname( dirname(__FILE__)) . "/Models/CustomersModel.php";

Class CustomersController
{


  public function list( $params = null)
  {

  	$model = new CustomersModel();

    return ( MessagesClass::Response( array(
        'success' => true,
        'type' => 'RESULTS',
        'code' => CODE_ERROR,
        'message' => 'List',
        'http_code' => 'http/1.1 200 accepted',
        'data' =>  $model->List( $params),
      )
    ));

  }

  public function list_products( $params = null)
  {

  	if ( empty( $params))
  	{

  		return ( MessagesClass::Response( array(
        'success' => false,
        'type' => 'ERROR',
        'code' => 'CT0001-' . CODE_ERROR,
        'http_code' => 'HTTP/1.1 405 Method Not Allowed',
        'message' => str_replace( "#", $method, ConfigClass::get("messages.CT0001")),
        )
      ));

  	}

  	$model = new CustomersModel();

    return ( MessagesClass::Response( array(
        'success' => true,
        'type' => 'RESULTS',
        'code' => CODE_ERROR,
        'message' => 'List',
        'http_code' => 'http/1.1 200 accepted',
        'data' =>  $model->ListProducts( $params),
      )
    ));

  }

}