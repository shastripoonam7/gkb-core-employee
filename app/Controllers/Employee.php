<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Employee extends BaseController
{

    public function __construct()
    {
        helper('form', 'url');

        require_once APPPATH . 'ThirdParty/ssp.class.php';
    }
    public function index()
    {
        $emp = new EmployeeModel();
        //$data['emp'] = $emp->orderBy('id', 'desc')->findAll();
        $this->showEmployee();
    }

    public function showEmployee()
    {
        $data['css'] = array();
        $data['appjs'] = array('js/employee.js');
        echo view('header');
        echo view('employee', $data);
        echo view('footer');
    }
    public function addEmp()
    {
        try {
            $emp = new EmployeeModel();
            $request = \Config\Services::request();
            $data['first_name'] = $first_name = $request->getVar('first_name');
            $data['last_name'] = $request->getVar('last_name');
            $data['email'] = $email = $request->getVar('email');
            $hobbies = $request->getVar('hobbies');
            if (is_array($hobbies)) {
                $hobbies = implode(',', $hobbies);
            }
            $data['hobbies'] = $hobbies;
            $data['gender'] = $request->getVar('gender');
            $data['joining_date'] = $request->getVar('joining_date');
            $data['department'] = $request->getVar('department');
            $file = $request->getFile('image');
            if (!is_dir(EMP_IMAGE_PATH)) {
                mkdir(EMP_IMAGE_PATH, 0777, true);
            }
            $file->move(EMP_IMAGE_PATH);
            $name = $file->getName();
            $data['image_path'] = $name;
            $data['created_at'] = date("Y-m-d  H:i:s");

            $result = $emp->insert($data);
            //print_r($result);
            $response = array();
            if ($result >= 1) {
                $response['success'] = true;
                $response['msg'] = "Record added successfully!";
            } else {
                $response['success'] = false;
                $response['msg'] = "Something went wrong!";
            }
            echo json_encode($response);

        } catch (\Exception$e) {
            echo json_encode($e->getMessage());
        }
    }

    public function deleteEmp()
    {
        try {
            $emp = new EmployeeModel();
            $id = $this->request->getVar('id');
            $result = $emp->where('id', $id)->delete($id);
            $response = array();
            if ($result) {
                $response['success'] = true;
                $response['msg'] = "Record updated successfully!";
            } else {
                $response['success'] = false;
                $response['msg'] = "Something went wrong!";
            }
            echo json_encode($response);

        } catch (\Exception$e) {
            echo json_encode($e->getMessage());
        }
    }

    public function fetchSingleEmp()
    {
        try {
            $emp = new EmployeeModel();
            $id = $this->request->getVar('id');
            $result = $emp->where('id', $id)->first();
            //print_r($result['id']); die;
            $response = array();
            if ($result) {
                $response['id'] = $result['id'];
                $response['first_name'] = $result['first_name'];
                $response['last_name'] = $result['last_name'];
                $response['email'] = $result['email'];

                $gender = $result['gender'];
                if (!empty($gender)) {
                    $response['gender'] = $gender;
                } else {
                    $response['gender'] = '';
                }

                $hobbies = explode(',', $result['hobbies']);
                if (!empty($hobbies)) {
                    $response['hobbies'] = $hobbies;
                } else {
                    $response['hobbies'] = array();
                }

                $joining_date = $result['joining_date'];
                if (!empty($joining_date)) {
                    $response['joining_date'] = $joining_date;
                } else {
                    $response['joining_date'] = '';
                }

                $department = $result['department'];
                if (!empty($department)) {
                    $response['department'] = $department;
                } else {
                    $response['department'] = '';
                }

                // $imagepath = $result['image_path'];
                // $response['image'] = '';
                // if (!empty($imagepath)) {
                //     $imagepath = EMP_IMAGE_PATH . '/' . $imagepath;
                //     $type = pathinfo("$imagepath", PATHINFO_EXTENSION);
                //     $data64 = file_get_contents("$imagepath");
                //     if($data64)
                //     {
                //         $base = 'data:image/' . $type . ';base64,' . base64_encode($data64);
                //         $response['image'] = $result['image_path'];
                //     }
                // }

                $response['success'] = true;
                //$response['msg'] = "Record updated successfully!";
            } else {
                $response['success'] = false;
                $response['msg'] = "Something went wrong!";
            }
            echo json_encode($response);

        } catch (\Exception$e) {
            echo json_encode($e->getMessage());
        }

    }

    public function editEmp()
    {
        try {
            $emp = new EmployeeModel();
            $request = \Config\Services::request();
            $id = $request->getVar('hdn_id');
            //echo $id; die;
            $data['first_name'] = $first_name = $request->getVar('first_name');
            $data['last_name'] = $request->getVar('last_name');
            $data['email'] = $email = $request->getVar('email');
            $hobbies = $request->getVar('hobbies');
            if (is_array($hobbies)) {
                $hobbies = implode(',', $hobbies);
            }
            $data['hobbies'] = $hobbies;
            $data['gender'] = $request->getVar('gender');
            $data['joining_date'] = $request->getVar('joining_date');
            $data['department'] = $request->getVar('department');
            $file = $request->getFile('image1');
            $name = $file->getName();
            if (!empty($name)) {
                if (!is_dir(EMP_IMAGE_PATH)) {
                    mkdir(EMP_IMAGE_PATH, 0777, true);
                }
                $file->move(EMP_IMAGE_PATH);

                $data['image_path'] = $name;
            }

            $data['created_at'] = date("Y-m-d  H:i:s");

            $result = $emp->update($id, $data);
            //print_r($result);
            $response = array();
            if ($result) {
                $response['success'] = true;
                $response['msg'] = "Record added successfully!";
            } else {
                $response['success'] = false;
                $response['msg'] = "Something went wrong!";
            }
            echo json_encode($response);

        } catch (\Exception$e) {
            echo json_encode($e->getMessage());
        }

    }

    public function loaddatatable()
    {
        try {
            $emp = new EmployeeModel();
            $response = $emp->list_data_using_ssp_ajax();
            echo json_encode($response);
        } catch (\Exception$e) {
            echo json_encode($e->getMessage());
        }
    }

    public function ImportCSV()
    {
        $emp = new EmployeeModel();
        $request = \Config\Services::request();
        if ($request->getMethod() == "post") {

            $file = $request->getFile("upload_csv");
            //print_r( $file ); die;

            $file_name = $file->getTempName();
            if (!$file_name) {
                $response['success'] = false;
                $response['msg'] = "Please Select File.";
                echo json_encode($response);
                exit;
            }

            $employee = array();

            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {

                $index = 0;

                // if (empty($csv_data[0]) || empty($csv_data[1]) || empty($csv_data)) {
                //     $response['success'] = false;
                //     $response['msg'] = "Your csv file should have First Name, Last Name and Email Record.";
                //     echo json_encode($response);
                //     exit;
                // }

                foreach ($csv_data as $data) {

                    if ($index > 0) {

                            $employee[] = array(
                                "first_name" => $data[0],
                                "last_name" => $data[1],
                                "email" => $data[2],
                                "hobbies" => $data[3],
                                "gender" => $data[4],
                                "joining_date" => $data[5],
                                "department" => $data[6],
                            );
                    }
                    $index++;
                }

                $result = $emp->insertBatch($employee);
                $response['success'] = true;
                $response['msg'] = "File Imported Successfully.";
                echo json_encode($response);
                
                // $session = session();

                // $session->setFlashdata("success", "Data saved successfully");

                // return redirect()->to(base_url('Employee'));
            }
        }

    }

}
