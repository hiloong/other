<?php
    

function get_net_dev() {
    $f = file('/proc/net/dev');
    for($i = 0; $i < count($f); $i++) {
        if(stristr($f[$i], 'eth0')) {
            $info = $f[$i]; 
            break;
        } 
    }
    $info = preg_replace('/\s+/i', '#', $info); 
    $info = explode("#", $info);

    $ans['in_bit'] = $info[2];
    $ans['in_packet'] = $info[3];
    $ans['out_bit'] = $info[10];
    $ans['out_packet'] = $info[11];
    return $ans;
}



echo json_encode(get_net_dev());

