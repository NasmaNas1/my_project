<?php
namespace app\controller;

require __DIR__.'/../model/userModel.php';
use app\models\userModel;

class UserCont{
    private $model;

    public function __construct($db){

      $this->model= new userModel($db);

    }
    public function jsonResponce($data){
      header("Content-type:application/json");
      echo json_encode($data);
      
    }
    
    public function index() {
      $users = $this->model->get();
      $this->jsonResponce($users);
    }
    public function add() {
      if($_SERVER['REQUEST_METHOD']=='POST') {
        $Fname=$_POST['Fname'];
        $Lname=$_POST['Lname'];
        $birthday=$_POST['birthday'];
        $data= [
          'Fname' => $Fname,
          'Lname' => $Lname,
          'birthday' =>$birthday,
        ];
        
        if($this->model->add($data)){
          
           $this->jsonResponce( ['message'=>'done']);
        
        }else {
           $this->jsonResponce(['error'=>"failed to add user."]);
        }
      }
    }

    public function show($id) {
      // header("Content-type:application/json");
      $users = $this->model->getUserById($id);
      if($users){
        echo json_encode($users);
      }else{
        echo json_encode(['message'=>'failed to show User']);
      }
   
      
     

    }
    
    public function delete($id) {
      header("Content-type:application/json");
      $users=$this->model->delete($id);
      if($users) {
        json_encode($users);
        echo  json_encode(['message'=> 'done']);
           
        } else {
            echo json_encode(['message'=> 'Failed to delete user.']);
        }
    }
  
    public function edit($id) {
      $user = $this->model->getUserById($id);
      include __DIR__.'/../../resource/edit_user.php';
  }

  public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $birthday=$_POST['birthday'];
        $data = [
            'Fname' => $Fname,
            'Lname' => $Lname,
            'birthday'=>$birthday,
        ];

        if ($this->model->update($id, $data)) {
            echo "User updated successfully!";
            header('Location:' . BASE_PATH);
        } else {
            echo "Failed to update user.";
        }
    } else {
        $user = $this->model->getUserById($id);
        include __DIR__.'/../../resource/edit_user.php';
    }
}

   }
    


