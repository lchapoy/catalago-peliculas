<?php
    class AgregarEditarView{
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

        public function renderInput($type, $name, $placeholder, $icon) {
            $aria = $name.'HelpBlock';
            $label = ucfirst($name);
            $value = $this->model->{$name};
            $error = $name.'_err';
            $hasError = $this->getErrorClass($this->model->{$error});
            return "
                <div class='form-group $hasError'>
                    <label>{$label}</label>
                    <div class='input-group mb-2 mr-sm-2'>
                        <div class='input-group-prepend'>
                            <div class='input-group-text'><i class='fas fa-{$icon}'></i></div>
                        </div>
                        <input
                            type='{$type}'
                            name='{$name}'
                            class='form-control'
                            value='{$value}'
                            placeholder='{$placeholder}'
                            aria-describedby='{$aria}'
                        >
                    </div>
                    <span id='usernameHelpBlock' class='help-block text-muted'>{$this->model->{$error}}</span>
                </div>
            ";
        }

        public function renderTextArea($name, $placeholder, $icon) {
            $aria = $name.'HelpBlock';
            $label = ucfirst($name);
            $value = $this->model->{$name};
            $error = $name.'_err';
            $hasError = $this->getErrorClass($this->model->{$error});
            return "
                <div class='form-group $hasError'>
                    <label>{$label}</label>
                    <div class='input-group mb-2 mr-sm-2'>
                        <div class='input-group-prepend'>
                            <div class='input-group-text'><i class='fas fa-{$icon}'></i></div>
                        </div>
                        <textarea
                            name='{$name}'
                            class='form-control'
                            placeholder='{$placeholder}'
                            aria-describedby='{$aria}'
                        >$value</textarea>
                    </div>
                    <span id='$aria' class='help-block text-muted'>{$this->model->{$error}}</span>
                </div>
            ";
        }

       public function render(){

          $formAction = htmlspecialchars($_SERVER['PHP_SELF']).'?'.http_build_query($_GET);
          $titleInput = $this->renderInput('text','title', 'please enter title', 'heading');
          $overviewInput = $this->renderTextArea('overview', 'please enter overview', 'align-justify');
          $subtitleInput = $this->renderInput('textbox', 'subtitle', 'please enter subtitle', 'comments');
          $ratingInput = $this->renderInput('number', 'rating', 'please enter rating', 'star');
          $submitName = $this->model->id ? 'editarPelicula' : 'agregarPelicula';
          $submitValue = $this->model->id ? 'Editar Pelicula' : 'Agregar Pelicula';
          echo "
             <div class='wrapper'>
                 <h2 class='title'> CataPeli </h2>
                 <form action='$formAction' method='post'>
                    $titleInput
                    $subtitleInput
                    $overviewInput
                    $ratingInput
                    <span id='formHelpBlock' class='help-block text-muted'>{$this->model->form_err}</span>
                     <div class='form-group'>
                         <input type='submit' class='btn btn-primary' value='$submitValue' name='$submitName'>
                     </div>
                 </form>
             </div>
         ";
       }
    }
?>