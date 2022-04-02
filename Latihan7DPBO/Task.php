<?php 

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}
	function addTask($tname, $tdeadline, $tdetails, $tsubject, $tpriority){
		// Proses input query mysql
		$query = "INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td) values ('$tname', '$tdetails', '$tsubject', '$tpriority', 
		'$tdeadline', 'Belum')";
		return $this->execute($query);
	}
	function deleteTask($id){
		// Delete record berdasarkan ID hapus pada index (id Hapus = ID_Data)
		$query = "DELETE FROM tb_to_do where id = $id";
		return $this->execute($query);
	}
	function finishedTask($id){
		// Mengubah status berdasrkan ID Hapus pada Index
		$query = "UPDATE tb_to_do set status_TD = 'Sudah' where id=$id";
		return $this->execute($query);
	}
	function sortingAsc($value, $string){
		// Proses sorting ascending secara normal
		if($value == 1){
			$query = "SELECT * from tb_to_do order by $string ASC";
		// Proses sorting ascending dengan menambahkan bebe
		}else if($value == 3){
			$query = "SELECT * from tb_to_do ORDER BY case when $string = 'High' then 3 when $string ='Medium' then 2 when $string = 'Low' then 1 end asc";
		}
		return $this->execute(($query));
	}
	
}

?>