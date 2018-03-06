 <?php
 defined('BASEPATH') OR exit ('No direct script access allowed');
 
 class Main extends CI_Controller{
	 
	 
	 public function index(){
		 
		 
             $this->load->view('main_view'); 
              /*   $data['test1']="Hello";
                 $data['test2']="Mizan";
                 $this->load->model('Main_model');
                 
                 $data['model_data']=$this->Main_model->test_main();
                 $this->load->view('view',$data);
               * 
               */
	 }
	 
	 public function form_validation()
	 {
		 //echo 'checking form_validation function';
                 $this->load->library('form_validation');
                 $this->form_validation->set_rules("first_name","First name",'required|alpha');
                 $this->form_validation->set_rules("last_name","Last name",'required|alpha');
	 
                 if($this->form_validation->run())
                     
                 {
                     //true
                     $this->load->model('main_model');
                     $data=array(
                         
                         "first_name"=>$this->input->post('first_name'),
                         "last_name"=> $this->input->post('last_name')
                         
                     );
                     
                     $this->main_model->insert_data($data);
                     redirect(base_url()."index.php/main/inserted"); 
                     
                 }else {
     
                             $this->index();
     
                        }
                     
                 
         }
         
         public function inserted(){
             
            $this->index(); 
             
         }
 }
	 