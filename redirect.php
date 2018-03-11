<?php
move_uploaded_file($_FILES['testfile']['tmp_name'],'tests.json');
header('Location: http://localhost/ntgy_hw/hw_2.3/list.php ');
