<?php
class Database{
	private $cnn;
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $dbname="shop_project";
	public $last_id;
	public $tbl=array('tbl_slide','tbl_category','tbl_sub_category','tbl_product');
	//connection
	private function conn(){
		$this->cnn = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
	}
	//select_data
	function select_data($tbl,$fld,$con,$od,$limit){
		$this->conn();
		$data=array();
		$sql="SELECT $fld FROM $tbl WHERE $con ORDER BY $od LIMIT $limit";
		$result = $this->cnn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$data[]=$row;
			}
			return $data;
		}else{
			return '0';
		}
	}
	//mulit Select tbl
	function select_inner_join_data($sql){
		$this->conn();
		$result = $this->cnn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$data[]=$row;
			}
			return $data;
		}else{
			return '0';
		}
	}
	//save data
	function save_data($tbl,$val){
		$this->conn();
		$sql="INSERT INTO $tbl VALUES($val)";
		$this->cnn->query($sql);
		$this->last_id = $this->cnn->insert_id;
	}
	///Updeaet DAta
	function upd_data($tbl,$fld,$con){
		$this->conn();
		$sql="UPDATE $tbl SET $fld WHERE $con";
		$this->cnn->query($sql);
	}
	///Duplicate Data 
	function dpl_data($tbl,$fld,$con){
		$this->conn();
		$sql="SELECT $fld FROM $tbl WHERE $con";
		$result=$this->cnn->query($sql);
		$num=$result->num_rows;
		if($num>0){
			return true;
		}
		return false;
	}
	//Get Auto Id
	function get_auto_id($opt,$fld){
		$this->conn();
		$sql="SELECT $fld FROM ".$this->tbl[$opt]." ORDER BY $fld DESC";
		$result=$this->cnn->query($sql);
		$num=$result->num_rows;
		if($num>0){
			$row=$result->fetch_array();
			return $row[0];
		}
		return 0;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>