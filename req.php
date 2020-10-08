<?php 
require_once __DIR__ . '/data.php';
$inputStreamData = json_decode(file_get_contents("php://input"),1);
    // _l($inputStreamData);
    $main = $inputStreamData['main'];
    $answers = $inputStreamData['answers'];
    $flag;
    $animal;

    // Nustatau pagrindi gyvuna
    foreach($data as $key => $value) {
        if($main == $data[$key]['id']) {
            $animal = $data[$key]['animal'];
        }
    }
    // Skaiciuoju kiek teisingu gyvunu yra $data
    $countAnimals = 0;
    foreach($data as $v) {
        if($v['animal'] == $animal) {
            $countAnimals++;
        }
    }
    // skaiciuju kiek atsake teisingai
    $count = 0;
    foreach($data as $key => $value) {
        if($value['animal'] == $animal) {
            foreach($answers as $val) {
                if($data[$key]['id'] == $val) {
                    $count++;
                }
            }
        }
    }
    // Skaiciuju kiek is viso pateike atsakymu
    $total = count($answers);
    // tikrinu ar pateiktu atsakymu skaicius sutampa su teisingu atsakymu skaiciumi
    if($total == ($countAnimals-1)) {
        // jei taip, lyginu ar atsakytu teisingu gyvunu skaicius yra toks pat kaip ir $datoj
        if(($countAnimals-1) === $count) {
            $flag = true;
        } else {
            $flag = false;
        }
    } else {
        $flag = false;
    }

    $ats = $flag;

    header('Content-type:application/json;charset=utf-8');
    echo json_encode(['atsakymas' => $ats]);
    