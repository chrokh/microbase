<!DOCTYPE html>
<html>
<head>
<title>E-Services</title>
</head>
<body>

<header>
  <h1>Header</h1>
</header>

<?php Router::Route(); ?>

<footer>
  <h2>Footer</h2>
  <?php if(SessionHelper::CurrentUser() != null): ?>
    <form action="/logout" method="POST">
      <button>Log out</button>
    </form>
  <?php else: ?>
    <a href="/login">Login</a>
  <?php endif; ?>
</footer>

</body>
</html>

