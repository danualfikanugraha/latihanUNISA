<?php if(!defined('D_KEY_PIPE'))exit;?>
<?php 
    if(isset($_GET['id'])){
     $id=(int)$_GET['id'];  
     $data=$danu-> get_row("SELECT * from latihandanu_user WHERE id=$id");
     echo json_encode($data);
    }
    else {
    
    $data=$danu-> get_results("SELECT * from latihandanu_user WHERE status=1");
    $rest=array();
    foreach($data as $k => $v){
        $rest[]=array($k + 1, $v -> nama, $v -> keterangan, $v-> status, $v -> id);
    }
    echo json_encode($rest);
    }
    
    
    
/*CREATE TABLE `latihandanu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4
*/
?>