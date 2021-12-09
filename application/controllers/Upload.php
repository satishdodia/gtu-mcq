<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //  $this->load->database();
        $this->load->model('import_model', 'import');
        $this->load->model('Semestermodel');
        $this->load->model('standardmodel');
        $this->load->model('Subjectmodel');
        $this->load->model('Lessonmodel');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['std'] = $this->Subjectmodel->getallstd();
        $data['sem'] = $this->Subjectmodel->getallsem();
        $data['sub'] = $this->Subjectmodel->getall();
        $data['les'] = $this->Lessonmodel->getall();
        $data['quiz_master'] = $this->import->getall_join();
        $this->load->view('upload', $data);
    }

    public function uploadCsv() {

        $this->load->view('upload');
    }

    public function uploadData() {

        if ($this->input->post('submit')) {

            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i = 0;

                    $quiz_data = array(
                        'branch_id' => $this->input->post('std'),
                        'sem_id' => $this->input->post('sem'),
                        'sub_id' => $this->input->post('sub_id'),
                        'lesson_id' => $this->input->post('less_id'),
                        'title' => $this->input->post('title'),
                        'quiz_code' => $this->input->post('quiz_id'),
                    );
                    $quiz_id = $this->import->addquiz($quiz_data);

                    foreach ($allDataInSheet as $value) {
                        if ($flag) {
                            $flag = false;
                            continue;
                        }
                        if ($value['A'] != '') {
                            $inserdata[$i]['quiz_id'] = $quiz_id;
                            $inserdata[$i]['question'] = $value['A'];
                            $inserdata[$i]['opt1'] = $value['B'];
                            $inserdata[$i]['opt2'] = $value['C'];
                            $inserdata[$i]['opt3'] = $value['D'];
                            $inserdata[$i]['opt4'] = $value['E'];
                            $inserdata[$i]['ans'] = $value['F'];
                            $inserdata[$i]['desc'] = $value['G'];
                            $i++;
                        }
                    }


                    $result = $this->import->importdata($inserdata);
                    if ($result) {
                        echo "Imported successfully";
                    redirect('upload');
                    } else {
                        echo "ERROR !";
                    }
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' . $e->getMessage());
                }
            } else {
                echo $error['error'];
            }
        }
        
        redirect('upload');
    }

    public function delete($id) {
        $result = $this->import->delete_quiz($id);
        if ($result) {
            redirect('upload');
        } else {
            echo "Something Wend Wrong! Please Try Again...";
        }
    }

}

?>
