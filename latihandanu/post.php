<?php if(!defined('D_KEY_PIPE'))exit;?>
<?php
    if (isset($_POST['hapus'])){
        $id = (int)$_POST['hapus'];
        $danu -> update ('latihandanu_user', array ('status'=>0),array('id'=>$id));
        echo 'ok';
    }
    else
    if (isset($_POST['id'])){
        $id = (int)$_POST['id'];
        $danu -> update ('latihandanu_user', array ('nama'=>$_POST['nama'], 'keterangan'=>$_POST['keterangan']),array('id'=>$id));
        echo 'ok';
    }else {
    $danu -> insert ('latihandanu_user', array ('nama'=>$_POST['nama'], 'keterangan'=>$_POST['keterangan'], 'status'=>1));
    echo 'ok';
}
?>