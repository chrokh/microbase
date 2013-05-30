<h1>All todos</h1>

<ul>
  <?php foreach(getvar('todos') as $t): ?>
  <li><?php echo "$t"; ?></li>
  <?php endforeach; ?>
</ul>
