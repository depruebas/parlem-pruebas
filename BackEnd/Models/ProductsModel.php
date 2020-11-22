<?php


Class ProductsModel
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

  	$params['query'] = "SELECT * From Products Where 1 = 1 " . $where;
    $params['params'] = array();

    return (  PDOClass2::ExecuteQuery( $params));

  }



}