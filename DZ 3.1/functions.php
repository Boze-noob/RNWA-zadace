<?php

function get_employees($id=0)
{
	global $connection;
	$query="SELECT * FROM employees";
	if($id != 0)
	{
		$query.=" WHERE emp_no=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
}

function insert_employee()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		//auto-increment is not enabled for this field in database
		$employee_no = $data["emp_no"];
		$employee_bdate		=$data["birth_date"];
		$employee_fname		=$data["first_name"];
		$employee_lname		=$data["last_name"];
		$employee_gender		=$data["gender"];
		$query="INSERT INTO employees VALUES ('".$employee_no."','".$employee_bdate."','".$employee_fname."','".$employee_lname."','".$employee_gender."',DATE(NOW()))";
		
		
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			
			if ($broj_redaka > 0){
				$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Added Successfully.'
				);
				
			}
			else {
				$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Insert Error.'
				);
				
			}
			
		}
		else
		{

			$response=array(
				'status' => 0,
				'query' => $query,
				'status_message' =>'Employee Addition Error.',
				'sql_error' => mysqli_error($connection)
				
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_employee($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$employee_fname		=$post_vars["first_name"];
		$employee_lname		=$post_vars["last_name"];
		$employee_gender	=$post_vars["gender"];
		$employee_bdate		=$post_vars["birth_date"];
		$employee_hdate		=$post_vars["hire_date"];
		
		$query="UPDATE employees SET first_name='".$employee_fname."', last_name='".$employee_lname."', gender='".$employee_gender."', birth_date='".$employee_bdate."', hire_date='".$employee_hdate."' WHERE emp_no=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);
		
		if($result)
		{
			if($broj_redaka > 0){
				$response=array(
					'status' => 1,
					'query' => $query,
					'broj_redaka' => $broj_redaka,
					'status_message' =>'Employee Updated Successfully.'
				);
			} else {
				$response=array(
					'status' => 0,
					'query' => $query,
					'broj_redaka' => $broj_redaka,
					'status_message' =>'No rows affected'
				);
			}
			
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_employee($id)
{
	global $connection;
	$query="DELETE FROM employees WHERE emp_no=".$id;
	if($result = mysqli_query($connection, $query))
	{
		$broj_redaka = mysqli_affected_rows($connection);
		//echo $broj_redaka;
		if ($broj_redaka === 1) {
			$response=array(
			'status' => 1,
			'broj_redaka' => $broj_redaka,
			'status_message' =>'Employee Deleted Successfully.'
		);
		}
		else {
			$response=array(
				'status' => 0,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'No data found with id: ' .$id
			);	
		}

	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Employee Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}
?>