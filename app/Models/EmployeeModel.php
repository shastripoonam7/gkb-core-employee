<?php 
namespace App\Models;
use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'tbl_employee';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name','last_name','gender','hobbies','email','joining_date','department','created_at','image_path'];

    public function list_data_using_ssp_ajax()
    {
        // this is database details
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

       $table = "tbl_employee";

        //primary key
    $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "first_name",
                "dt" => 1,
            ),
            array(
                "db" => "last_name",
                "dt" => 2,
            ),
            array(
                "db" => "email",
                "dt" => 3,
            ),
            array(
                "db" => "hobbies",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    if(empty($value))
                    return '-';
                    else
                    return $value;
                },
            ),
            array(
                "db" => "gender",
                "dt" => 5,
                "formatter" => function ($value, $row) {
                    if(empty($value))
                    return '-';
                    else
                    return $value;
                },
            ),
            array(
                "db" => "joining_date",
                "dt" => 6,
                "formatter" => function ($value, $row) {
                    if(empty($value))
                    return '-';
                    else
                    return  date ('d-m-Y', strtotime($value));
                },
            ),
            array(
                "db" => "department",
                "dt" => 7,
                "formatter" => function ($value, $row) {
                    if(empty($value))
                    return '-';
                    else
                    return $value;
                }
            ),
            array(
                "db" => "image_path",
                "dt" => 8,
                "formatter" => function ($value, $row) {
                    if(empty($value))
                    return '-';
                   $imagepath =EMP_IMAGE_PATH.'/'.$value;
                  // echo $imagepath; die;
                  if(!file_exists($imagepath))
                            return '-';
                   $type = pathinfo("$imagepath", PATHINFO_EXTENSION);
                    $data = file_get_contents("$imagepath");
                  //  echo $data; die;
                    $base = 'data:image/' .$type.';base64,'.base64_encode($data);
                    $str ='<button type="button" class="btn btn-primary btn-sm" id="viewimage" onclick=viewimage("'.$base.'")><i class="fas fa-image"></i></button>';
                    return  $str;
                },
            ),
            array(
                "db" => "id",
                "dt" => 9,
                "formatter" => function ($value, $row) {
                    $str ='<button type="button" class="btn btn-info btn-sm" id="editbtn" onclick="edit('. $value.')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="editbtn" onclick="deleteEmp('. $value.')"><i class="fas fa-trash-alt"></i></button>';
                    return  $str;
                },
            )
        );

        return  \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns);
    
    }
    
}