<?php
  class SessionManager{
    public function start(){
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
    }
    
    public function set ($key , $value){
      $_SESSION[$key] = $value;
    }

    public function get($key){
      return $_SESSION[$key] ?? null;
    }

    public function has($key){
      return isset($_SESSION[$key]);
    }

    public function destroy(){
      session_destroy();
    }
    
    public function increment($key){
      if (!this->has($key)){
        $_SESSION[$key] = 1;
      }else{
        $_SESSION[$key]++;
      }
    }
?>