<?php

namespace Rioagungpurnomo\Dcobwebs;

class DCobwebs
{
  public static function create_data($array, $table)
  {
    if (file_exists("database/$table.json")) {
      $fields = file_get_contents('database/field/' . $table . '.json');
      $data_fields = json_decode($fields, true);
      $keys = array_keys($array);

      foreach ($keys as $ks) {
        if (!in_array($ks, $data_fields)) {
          echo "Field name $ks is missing in table $table.";
          die;
        }
      }

      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);

      $data_id = file_get_contents('database/id/' . $table . '.json');
      $id_count = json_decode($data_id, true);

      if ($id_count == null) {
        $id = 0;
      } else {
        $id = $id_count[0] + 1;
      }

      $array = array_reverse($array, true);
      $array = array_merge(['id' => $id], $array);
      $array = array_reverse($array, true);
      $data_array[] = $array;

      $data = json_encode($data_array);
      file_put_contents("database/$table.json", $data);
      file_put_contents('database/id/' . $table . '.json', json_encode([$id]));
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function update_data($id, $array, $table)
  {
    if (file_exists("database/$table.json")) {
      $fields = file_get_contents('database/field/' . $table . '.json');
      $data_fields = json_decode($fields, true);
      $keys = array_keys($array);

      foreach ($keys as $ks) {
        if (!in_array($ks, $data_fields)) {
          echo "Field name $ks is missing in table $table.";
          die;
        }
      }

      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);

      $index = 0;
      foreach ($data_array as $key => $value) {
        if ($value['id'] == $id) {
          $index = $key;
          break;
        }
      }

      foreach ($array as $keyy => $valuee) {
        $data_array[$index][$keyy] = $valuee;
      }

      $data = json_encode($data_array);
      file_put_contents("database/$table.json", $data);
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function delete_data($id, $table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);

      $index = null;
      foreach ($data_array as $key => $value) {
        if ($value['id'] == $id) {
          $index = $key;
          break;
        }
      }

      if ($index !== null) {
        unset($data_array[$index]);
        $data_array = array_values($data_array);
        $data = json_encode($data_array);
        file_put_contents("database/$table.json", $data);
      }
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function count_data($table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);

      if ($data_array == null) {
        $count = 0;
      } else {
        $count = count($data_array);
      }

      return $count;
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function single_data($id, $table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);

      $result = null;
      foreach ($data_array as $value) {
        if ($value['id'] == $id) {
          $result = $value;
          break;
        }
      }

      if ($result != null) {
        return $result;
      } else {
        echo "Data with id $id was not found.";
        die;
      }
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function all_data($table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/$table.json");
      $data_array = json_decode($data, true);
      return $data_array;
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function asc_data($field, $table)
  {
    if (file_exists("database/$table.json")) {
      $json = file_get_contents("database/$table.json");
      $data = json_decode($json, true);

      if (isset($data[0][$field])) {
        usort($data, function ($a, $b) use ($field) {
          return $a[$field] <=> $b[$field];
        });

        return $data;
      } else {
        echo "Field name $field is missing in table $table.";
        die;
      }
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }


  public static function desc_data($field, $table)
  {
    if (file_exists("database/$table.json")) {
      $json = file_get_contents("database/$table.json");
      $data = json_decode($json, true);
      if (isset($data[0][$field])) {
        usort($data, function ($a, $b) use ($field) {
          return $a[$field] + $b[$field];
        });

        return $data;
      } else {
        echo "Field name $field is missing in table $table.";
        die;
      }
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function create_table($name, $array)
  {
    if (file_exists("database/$name.json")) {
      echo "The name of the $name table already exists.";
      die;
    } else {
      if (preg_match('/^[a-zA-Z0-9_-]+$/', $name)) {
        touch("database/$name.json");
        touch("database/field/$name.json");
        touch("database/id/$name.json");

        $data = json_encode($array);
        file_put_contents("database/field/$name.json", $data);
      } else {
        echo "Allows only letters, numbers, dashes, and underscores.";
        die;
      }
    }
  }

  public static function list_table()
  {
    $table = glob("database/*.json");
    $tables = array();
    foreach ($table as $t) {
      $tables[] = explode(".", explode("/", $t)[1])[0];
    }

    return $tables;
  }

  public static function delete_table($table)
  {
    if (file_exists("database/$table.json")) {
      unlink("database/$table.json");
      unlink("database/field/$table.json");
      unlink("database/id/$table.json");
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function rename_table($old_name, $new_name)
  {
    if (file_exists("database/$new_name.json")) {
      echo "The name of the $new_name table already exists.";
      die;
    } else {
      if (preg_match('/^[a-zA-Z0-9_-]+$/', $new_name)) {
        rename("database/$old_name.json", "database/$new_name.json");
        rename("database/field/$old_name.json", "database/field/$new_name.json");
        rename("database/id/$old_name.json", "database/id/$new_name.json");
      } else {
        echo "Allows only letters, numbers, dashes, and underscores.";
        die;
      }
    }
  }

  public static function create_field_table($array, $table)
  {
    if (file_exists("database/field/$table.json")) {
      $data = file_get_contents("database/field/$table.json");
      $data_array = json_decode($data, true);

      foreach ($array as $f) {
        if (in_array($f, $data_array)) {
          echo "The name of the $f field already exists.";
          die;
        }
      }

      foreach ($array as $arr) {
        $data_array[] = $arr;
      }

      $data = json_encode($data_array);
      file_put_contents("database/field/$table.json", $data);
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function delete_field_table($field, $table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/field/$table.json");
      $data_array = json_decode($data, true);
      $key = array_search($field, $data_array);
      if ($key !== false) {
        unset($data_array[$key]);
      }

      $dataa = file_get_contents("database/$table.json");
      $database = json_decode($dataa, true);
      foreach ($database as $keyy => $valuee) {
        unset($database[$keyy][$field]);
      }

      $data = json_encode($data_array);
      $dataa = json_encode($database);
      file_put_contents("database/field/$table.json", $data);
      file_put_contents("database/$table.json", $dataa);
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function list_field_table($table)
  {
    if (file_exists("database/$table.json")) {
      $data = file_get_contents("database/field/$table.json");
      $data_array = json_decode($data, true);
      return $data_array;
    } else {
      echo "The table $table does not exist.";
      die;
    }
  }

  public static function encrypt($plaintext, $key, $iv)
  {
    $cipher = "aes-256-cbc";
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($ciphertext);
  }

  public static function decrypt($ciphertext, $key, $iv)
  {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return $plaintext;
  }
}
