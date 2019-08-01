<?php
    class LoginView{
        function __construct($controller,$model) {
           $this->controller = $controller;
           $this->model = $model;
        }

        public function getErrorClass ($test) {
            if(!empty($test)) {
                return 'has-error';
            } else {
                return '';
            }

        }

       public function render(){
          $formAction = htmlspecialchars($_SERVER['PHP_SELF']);
          $userError = $this->getErrorClass($this->model->username_err);
          $passwordError = $this->getErrorClass($this->model->password_err);
          echo <<<LoginTAG
             <div class='wrapper'>
                 <img src='/catapeli/images/popcorn.png' width='120' height='120' class='logor'>
                 <h2 class='title'> CataPeli </h2>
                 <form action='$formAction' method='post'>
                     <div class='form-group $userError'>
                         <label>Usuario</label>
                         <div class='input-group mb-2 mr-sm-2'>
                             <div class='input-group-prepend'>
                                 <div class='input-group-text'><i class='fas fa-user'></i></div>
                             </div>
                             <input type='text' name='username' class='form-control' value='{$this->model->username}' aria-describedby='usernameHelpBlock'>
                         </div>
                         <span id='usernameHelpBlock' class='help-block text-muted'>{$this->model->username_err}</span>
                     </div>
                     <div class='form-group $passwordError'>
                         <label>Contraseña</label>
                         <div class='input-group mb-2 mr-sm-2'>
                             <div class='input-group-prepend'>
                                 <div class='input-group-text'><i class='fas fa-key'></i></div>
                             </div>
                             <input type='password' name='password' class='form-control' aria-describedby='passwordHelpBlock'>
                         </div>
                         <span id='passwordHelpBlock' class='help-block text-muted' >{$this->model->password_err}</span>
                     </div>
                     <div class='form-group'>
                         <input type='submit' class='btn btn-primary' value='Iniciar Sesion' name='login'>
                     </div>
                 </form>
             </div>
         LoginTAG;
       }
    }
?>