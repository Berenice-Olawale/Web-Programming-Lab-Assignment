<?php
try { $dbh=dbConnect(); $messages=$dbh->query('select * from messages order by created_at desc')->fetchAll(PDO::FETCH_ASSOC); }
catch(PDOException $e){ $messages=array(); $crudMessage='<p class="notice error">'.htmlspecialchars($e->getMessage()).'</p>'; }
?>