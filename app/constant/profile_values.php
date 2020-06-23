<?php 
	$schedule_from_1 = array();
for ($i = 0; $i <= 23; $i++) {
	if($i<10){
	$schedule_from_1[] = '0'.$i;
	}else{
	$schedule_from_1[] = $i;
	}
};
// ######
$schedule_from_2 = array();
for ($i = 0; $i <= 59; $i++) {
	if($i<10){
	$schedule_from_2[] = '0'.$i;
	}else{
	$schedule_from_2[] = $i;
	}
};
// ######

$days = array(
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo'      
   );
   $chest = array(
        '85',
        '90',
        '95',
        '100',
        '105',
        '110',
        '115',   
        '120',   
   );
	
$hair_types = array(
        'Rubio',
        'Moreno',
        'Peli Rojo',
        'Castaño', 
    );
	
	$eye_types = array(
		'Negros',
        'Verdes',
        'Marrones',
        'Azules',
        'Miel'
    );
?>