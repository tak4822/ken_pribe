<?php

define('CONFIG_PATH', __DIR__ .'/../../config/config.ini');

function DBInsert ($table, $data) {
    $connect = DBConnect ();

    foreach ($data as &$value) {
        if (is_string($value)) {
            $value = '\'' . mysqli_real_escape_string($connect, $value) . '\'';
        }
    }

    $columns = implode(', ', array_keys($data));
    $values = implode(', ', $data);

    $query = "INSERT INTO $table ($columns) VALUES ($values)";

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
    return $result;
}


function DBSelectAll ($table) {
    $connect = DBConnect ();

    $query = "SELECT * FROM $table ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    while(($resultArray[] = mysqli_fetch_assoc($result)) || array_pop($resultArray));

    mysqli_close($connect);
    return $resultArray;
}

function DBRaw ($query) {
    $connect = DBConnect ();

    $result = mysqli_query($connect, $query);
    while(($resultArray[] = mysqli_fetch_assoc($result)) || array_pop($resultArray));

    mysqli_close($connect);
    return $resultArray;
}

function DBSelectLimit ($table, $amount, $from = 0) {
    $connect = DBConnect ();

    $query = "SELECT * FROM $table LIMIT $from, $amount";
    $result = mysqli_query($connect, $query);
    while(($resultArray[] = mysqli_fetch_assoc($result)) || array_pop($resultArray));

    mysqli_close($connect);
    return $resultArray;
}

function DBSelectWhere ($table, $where) {
    $connect = DBConnect ();

    $pairs = [];
    foreach ($where as $value) {
        $escValue = (is_string($value[2])) ? '\'' . mysqli_real_escape_string($connect, $value[2]) . '\'' : $value[2];
        array_push($pairs, $value[0] . $value[1] . $escValue);
    }
    $valueSet = implode(' AND ', $pairs);

    $query = "SELECT * FROM $table WHERE $valueSet";

    $result = mysqli_query($connect, $query);
    while(($resultArray[] = mysqli_fetch_assoc($result)) || array_pop($resultArray));

    mysqli_close($connect);
    return $resultArray;
}

function DBSelectById ($table, $id) {
    $connect = DBConnect ();

    $query = "SELECT * FROM $table WHERE id = $id";

    $result = mysqli_query($connect, $query);
    while(($resultArray[] = mysqli_fetch_assoc($result)) || array_pop($resultArray));

    mysqli_close($connect);
    return $resultArray;
}


function DBUpdateByID ($table, $data, $id) {
    $connect = DBConnect ();

    $pairs = [];
    foreach ($data as $key => $value) {
        $escValue = (is_string($value)) ? '\'' . mysqli_real_escape_string($connect, $value) . '\'' : $value;
        array_push($pairs, $key . ' = ' . $escValue);
    }
    $valueSet = implode(', ', $pairs);

    $query = "UPDATE $table SET $valueSet WHERE id = $id";

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
    return $result;
}

// DBUpdateByID('my_table', [
//   'name' => 'something',
//   'phone' => 9732984732
// ], 4);

function DBDelete ($table, $data) {
    $connect = DBConnect ();

    $pairs = [];
    foreach ($data as $key => $value) {
        $escValue = (is_string($value)) ? '\'' . mysqli_real_escape_string($connect, $value) . '\'' : $value;
        array_push($pairs, $key . ' = ' . $escValue);
    }
    $valueSet = implode(', ', $pairs);

    $query = "DELETE FROM $table WHERE $valueSet";

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
    return $result;
}

function DBConnect () {
    $config = parse_ini_file(CONFIG_PATH);
    $connect = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
    if(!$connect) {
        die('Connection failed because '. mysqli_connect_error());
    }
    mysqli_set_charset($connect, 'utf8');

    return $connect;
}
