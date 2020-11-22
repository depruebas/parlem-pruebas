<?php

include dirname( dirname(__FILE__)) . "/Models/ProductsModel.php";

Class ProductsController
{

	public function list( $params = null)
  {

  	$model = new ProductsModel();

  	return ( MessagesClass::Response( array(
	      'success' => true,
	      'type' => 'RESULTS',
	      'code' => CODE_ERROR,
        'message' => 'List',
        'http_code' => 'http/1.1 200 accepted',
	      'data' => $model->List( $params),
	    )
    ));

  }

}