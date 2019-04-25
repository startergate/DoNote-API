<?php
  require '../config/config.php';
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
  header('Access-Control-Max-Age: 3600');
  header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');
  header('Content-Type: application/json');
  $conn = new mysqli($config['host'], $config['duser'], $config['dpw'], $config['dname']);  //Note Database
  $sql = 'SELECT shareTable, shareID FROM sharedb_'.$_POST['pid'];
  $result = $conn->query($sql);
  $output = array('data' => []);
  if ($result) {
      while ($row = $result->fetch_assoc()) {
          $output['data'][] = ['noteid' => $row['shareTable'], 'shareid' => $row['shareID']];
      }
  }
  echo urldecode(json_encode($output));
