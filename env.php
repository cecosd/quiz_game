<?php
  $variables = [
      'DB_HOST' => 'localhost',
      'DB_USER' => 'root',
      'DB_PASS' => '',
      'DB_NAME' => 'orm',
      'DB_CHAR' => 'utf8',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }

  if(!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }
}
?>