<?php
class studentManager extends Application{


function getAllStudent(){
  echo $query = "SELECT student_id,name,roll_no,dept_name,email,mobile FROM student,department where student.dept_id=department.dept_id";
  $result = $this->executeQuery($query);
  return $result;

  }

  function getStudentById($stud_id){
    $query = "SELECT student_id,name,dept_name,roll_no,email,mobile,student.dept_id FROM student,department where student.dept_id=department.dept_id AND student.student_id=".$stud_id."";
    $result = $this->executeQuery($query);
    return $result;
  }

  function update_student($data)
  {
    print_r($data);
    $query = sprintf("UPDATE student SET name = '%s',roll_no = '%s',mobile = '%s',email = '%s',dept_id = '%s' WHERE student_id='%s'",
      $data['name'],$data['roll'],$data['mobile'],$data['email'],$data['dept'],$data['id']);
      echo "<br>".$query;
      if($result = mysqli_query($this->dbConnect,$query))
      {return 1;}
      return 0;
  }

  function add_student($data){
    print_r($data);
    $query = sprintf("INSERT INTO student (name,roll_no,mobile,email,dept_id) values('%s','%s','%s','%s','%s')",
      $data['name'],$data['roll'],$data['mobile'],$data['email'],$data['dept']);
      if($result = mysqli_query($this->dbConnect,$query))
      {return 1;}
      return 0;
  }

  function delete_student($del_id)
  {
    $query = sprintf("DELETE FROM student where student_id=%s",$del_id);
    echo $query;
    if($result = mysqli_query($this->dbConnect,$query))
    {return 1;}
    return 0;
  }

}
?>
