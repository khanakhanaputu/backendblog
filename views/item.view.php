<?php

function item($id){
    if($id== 0){
        echo "Data Tidak Ditemukan";
    }else{
        foreach ($id as $key) {
            echo $key["name"];
        }
    }
}