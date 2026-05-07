<?php
try {
    $dbh=dbConnect();
    if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id'])) { $stmt=$dbh->prepare('delete from notebook where id=:id'); $stmt->execute(array(':id'=>$_GET['id'])); $crudMessage='<p class="notice success">Notebook deleted.</p>'; }
    if(isset($_POST['save_notebook'])) {
        $data=array(':manufacturer'=>$_POST['manufacturer'],':type'=>$_POST['type'],':display'=>str_replace(',', '.', $_POST['display']),':memory'=>$_POST['memory'],':harddisk'=>$_POST['harddisk'],':videocontroller'=>$_POST['videocontroller'],':price'=>$_POST['price'],':processorid'=>$_POST['processorid'],':opsystemid'=>$_POST['opsystemid'],':pieces'=>$_POST['pieces']);
        if(!empty($_POST['id'])) { $data[':id']=$_POST['id']; $sql='update notebook set manufacturer=:manufacturer,type=:type,display=:display,memory=:memory,harddisk=:harddisk,videocontroller=:videocontroller,price=:price,processorid=:processorid,opsystemid=:opsystemid,pieces=:pieces where id=:id'; }
        else { $sql='insert into notebook(manufacturer,type,display,memory,harddisk,videocontroller,price,processorid,opsystemid,pieces) values(:manufacturer,:type,:display,:memory,:harddisk,:videocontroller,:price,:processorid,:opsystemid,:pieces)'; }
        $stmt=$dbh->prepare($sql); $stmt->execute($data); $crudMessage='<p class="notice success">Notebook saved successfully.</p>';
    }
    $processors=$dbh->query('select * from processor order by manufacturer,type')->fetchAll(PDO::FETCH_ASSOC);
    $opsystems=$dbh->query('select * from opsystem order by osname')->fetchAll(PDO::FETCH_ASSOC);
    $showForm=false; $item=array();
    if(isset($_GET['action']) && in_array($_GET['action'], array('create','edit'))) { $showForm=true; if($_GET['action']=='edit' && isset($_GET['id'])) { $stmt=$dbh->prepare('select * from notebook where id=:id'); $stmt->execute(array(':id'=>$_GET['id'])); $item=$stmt->fetch(PDO::FETCH_ASSOC); }}
    $search=trim($_GET['search'] ?? '');
    $sql='select n.*, p.manufacturer as processor_manufacturer, p.type as processor_type, o.osname from notebook n left join processor p on n.processorid=p.id left join opsystem o on n.opsystemid=o.id';
    $params=array(); if($search!=''){ $sql.=' where n.manufacturer like :s or n.type like :s'; $params[':s']='%'.$search.'%'; } $sql.=' order by n.id desc limit 50';
    $stmt=$dbh->prepare($sql); $stmt->execute($params); $notebooks=$stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e){ $crudMessage='<p class="notice error">'.htmlspecialchars($e->getMessage()).'</p>'; $processors=$opsystems=$notebooks=array(); $showForm=false; }
?>