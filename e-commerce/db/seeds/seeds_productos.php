<?php 
     $seiren_x = create_seed_prod(
        'Microfono',
        'Micrófono Razer Seiren X condensador supercardioide y cardioide classic black',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'Razer', 
        'Seiren X', 
        '../storage/img/mic_razer_seiren_x.jpg',
        '73399',
        '8',
        'http://mpago.la/2FVDfUS'
    );
    $quadcast = create_seed_prod(
        'Microfono',
        'Micrófono HyperX QuadCast Streaming Condensador USB PC-PS4',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'HyperX', 
        'QuadCast',  
        '../storage/img/mic_hyperx_quadcast.jpeg',
        '81000',
        '15',
        'http://mpago.la/2NbyQky'
        );
    $yeti_blackout = create_seed_prod(
        'Microfono',
        'Microfono Logitech Blue Yeti Blackout Condensador USB',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'Blue', 
        'Yeti Blackout', 
        '../storage/img/mic_blue_yeti_blackout.jpg',
        '79050',
        '7',
        'http://mpago.la/29MjhB3'
    );
    $blazar_gm300 = create_seed_prod(
        'Microfono',
        'Microfono Redragon Blazar GM300',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'RedDragon', 
        'BLAZAR GM300',  
        '../storage/img/mic_redragon_blazar_gm300.jpg',
        '43600',
        '5',
        'http://mpago.la/2XYUZ7u'
    );
    $essential = create_seed_prod(
        'Mouse',
        'Mouse Razer DeathAdder Essential negro',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'Razer', 
        'Essential DeathAdder',  
        '../storage/img/mouse_razer_essential.webp',
        '23000',
        '5',
        'http://mpago.la/2Pezeia'
    );
    $G203 = create_seed_prod(
        'Mouse',
        'Mouse Logitech G Series Lightsync G203 negro',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'Logitech', 
        'G203 Lightsync',  
        '../storage/img/mouse_logitech_g203.webp',
        '21050',
        '5',
        'http://mpago.la/1BpTYsp'
        );
    $pulsefire_surge = create_seed_prod(
        'Mouse',
        'Mouse HyperX Pulsefire Surge RGB 16.000DPI',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.', 
        'HyperX', 
        'Pulsefire Surge', 
        '../storage/img/mouse_hyperx_pulsefire_surge.jpg',
        '39650',
        '5',
        'http://mpago.la/1Xe1Y3v'
    );
    $M719_RGB = create_seed_prod(
        'Mouse',
        'Mouse Gamer Redragon Invader Botones Macros Dpi Rgb Luz',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, sequi obcaecati ducius corporis quos ea saepe aliquam officia facere odio amet ex vitae rem sunt illo iusto.',
        'RedDragon', 
        'Invader M719-RGB',  
        '../storage/img/mouse_reddragon_m719-rgb.webp',
        '12999',
        '5',
        'http://mpago.la/15o7Hdd'
    );
    function create_seed_prod($type,$title,$description,$brand,$model,$img,$price,$discount,$link){
        return ("INSERT INTO productos (type,title,description,brand,model,img,price,discount,link)
        VALUES ('".$type."','".$title."','".$description."','".$brand."','".$model."','".$img."','".$price."','".$discount."','".$link."')");
    }
?>