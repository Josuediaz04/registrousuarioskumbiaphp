<?php
    Load::models('usuarios');
    class UsuariosController extends AppController{
        public function index ($nombre=''){
            View:: template('principal');
            $this->listUsuarios=(new Usuarios)->getUsuarios($page=1);
        }
        public function registrar(){
            View:: template('principal');
        }

        public function guardar(){
            if(Input::hasPost('usuarios')){
                $usuario = new Usuarios(Input::post('usuarios'));
                if(!$usuario->create()){
                    Flash::error('fallo el guardado');
                }else{
                    Flash::valid('operacion exitosa');
                    Input::delete();
                    return Redirect::to();
                } 
            }
        }


        public function borrar($id)
        {
            if ((new Usuarios())->delete((int) $id)) {
                    Flash::valid('Operación exitosa');
            } else {
                    Flash::error('Falló Operación');
            }
    
                 return Redirect::to();
        }

        public function editar($id){
            View::template('principal');
            $usuario = new Usuarios();
            if(Input::hasPost('usuarios')){
              if($usuario->update(Input::post('usuarios'))){
                Flash::valid('Operacion exitosa');
                return Redirect::to();
              }else{
                Flash::error('Fallo de operacion');
                return;
              }
            }else{
              $this->usuarios = $usuario->find_by_id((int) $id);
            }
          }
 }