<?php


Class CustomersModel
{


  public function List( $data = null)
  {

  	if ( empty( $data))
  	{
  		$where = "";
  	}
  	else
  	{
  		$where = " And id = " . $data;
  	}

  	$params['query'] = "SELECT * From Customers Where 1 = 1 " . $where;
    $params['params'] = array();

    return ( PDOClass2::ExecuteQuery( $params));

  }

  public function ListProducts( $data = null)
  {

  	$params['query'] = "SELECT * From Products Where customer_id = ?";
    $params['params'] = array( $data);

    return ( PDOClass2::ExecuteQuery( $params));

  }


}