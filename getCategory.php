<?php
  require '../config/config.php';
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
  header('Access-Control-Max-Age: 3600');
  header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');
  header('Content-Type: application/json');
  $conn = new mysqli($config['host'], $config['duser'], $config['dpw'], $config['dname']);  //Note Database
  $sql = 'SELECT metadata, metaid FROM metadb_'.$_POST['pid']." WHERE datatype LIKE 'CATEGORY'";
  $result = $conn->query($sql);
  $output = array('data' => []);
  while ($row = $result->fetch_assoc()) {
      $output['data'][] = ['category_name' => $row['metadata'], 'category_id' => $row['metaid']];
  }
  $output = json_encode($output);
  echo urldecode($output);
