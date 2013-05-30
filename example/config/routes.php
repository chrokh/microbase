<?php

route('/', 'todos');
  function todos(){
    setvar('todos', array(
      'Buy milk', 
      'Feed cat', 
      'Eat cereal'));

    render('todos');
  }


route('/new', 'new_todo');
  function new_todo(){
    render('new_todo');
  }

?>
