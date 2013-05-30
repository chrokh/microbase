PHP MVC Microframework

Originally made to be used in the classroom, but I've not yet actually used it yet :)

Just for funs.

*Very much a work in progress*

Routing
=======
A route is defined like so:
```php
route('/', 'user');
  function user(){
    render('profile');
  }
```

Inside the route, we can pass stuff to the view, like so:
```php
setvar('username', 'John');
```

Of course we can point multiple routes to the same "function".

If we wish to redirect we can use:
```php
redirect('/');
```

Views
=====
Views are expected to live under `/views`. And in the views we can access the variables we previously set using `getvar('user');`.


And then?
=========
Nothing more!

Well, honestly there's some hooks and stuff in there but I guess I'll get onto that some other day.
