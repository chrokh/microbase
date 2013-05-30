<?php

require_once '../base/microbase.php';

/*
 *
 * Routes
 *
 */

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


route('/about', 'about');
  function about(){
    redirect('/');
  }


/*
 *
 * Let's go party!
 *
 */

microbase();

?>
