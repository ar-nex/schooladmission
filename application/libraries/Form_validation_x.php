<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_validation_x
 *
 * @author ami
 */
class Form_validation_x {
    
    // return bool element from run_x function. Initially it is false
    protected $validation_success = TRUE;


    // two dimentional array. holds type and name of the elements
    protected $elements = array();
    
    
    
    // two dimentional array. holds name and error pairs
    protected $f_error = array();
            
    
    
    
    
    
    /*
     * puts the element's type, name pair into $elements array
     * @param: type and name of element
     * return: 
     */
    public function set_element_x($type, $name){
        $this->elements[$name] = $type;
    }




    /*
    * Function for validation radio, date, combo, checkbox, file
    * @ param:
    * return TRUE on success else FALSE
    */
    
    public function run_x($post_array){
       if(count($this->elements) > 0){
           foreach ($this->elements as $name => $type) {
            
               switch ($type) {
                   case "radio":
                      if(!array_key_exists($name, $post_array)){
                          $this->validation_success = FALSE;
                          $this->f_error[$name] = "Please select one";
                         
                      }
                       break;
                       
                   case "select":
                       if($post_array[$name] === " "){
                           $this->validation_success = FALSE;
                           $this->f_error[$name] = "Plese select correct one";
                       }
                       break;
                   
                   case "checkbox":
                       if(!array_key_exists($name, $post_array)){
                          $this->validation_success = FALSE;
                          $this->f_error[$name] = "Please accept the declaration";
                           
                      }
                       break;
                   
                   case "date":
                       if($post_array[$name] === ""){
                           $this->validation_success = FALSE;
                           $this->f_error[$name] = "Plese enter date of birth";
                       }
                       
                       break;

                   default:
                       break;
               }
           }
       }
       
       return $this->validation_success;
    }
    
    public function getError_x(){
        return $this->f_error;
    }
    
    
}
