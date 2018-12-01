<?php
include 'connection.php';
$conn  = OpenCon();
$check = $_POST["c1"];


$year = $_POST["c2"];
$all  = $_POST["c3"];


if ($check == "ordertobrand") {
    if ($all == 0) {
        $sql = "SELECT a.Brand,count(*) FROM product_13142 as a inner JOIN (select c.item_id as item from invoice_mst_13142 b INNER join invoice_det_13142 c on b.INV_ID = c.inv_id ) as d on a.ProductCode =d.item group by a.Brand";
    } else {
        $sql = "SELECT a.Brand,count(*) FROM product_13142 as a inner JOIN (select c.item_id as item from invoice_mst_13142 b INNER join invoice_det_13142 c on b.INV_ID = c.inv_id where year(b.inv_date)='$year') as d on a.ProductCode =d.item group by a.Brand";
    }
}else if($check == "topCustomers"){
  if($all==0 ){
        $sql = "SELECT SName,co from customers13142 as h inner join (SELECT count(*) as co,party_Id FROM `invoice_mst_13142` GROUP by party_Id order by co desc limit 10) as g on h.CusID = g.party_id";
  }else{
      $sql = "SELECT SName,co from customers13142 as h inner join (SELECT count(*) as co,party_Id FROM `invoice_mst_13142` where year(inv_date)='
      $year' GROUP by party_Id order by co desc limit 10) as g on h.CusID = g.party_id";
  }
}else if($check == "amountReceived"){
  if($all==0 ){
        $sql = "SELECT year(pdate) as pyear ,sum(a.amount) as amount from ppayments_13142 as a group by year(pdate)";
  }else{
      $sql = "SELECT year(pdate) as pyear ,sum(a.amount) as amount from ppayments_13142 as a group by year(pdate)";
  }
}else if($check == "compare"){

        $sql = "SELECT ayear,acount,bcount from (SELECT count(*)as acount,year(a.inv_date) as ayear FROM `invoice_mst_13142` as a where a.party_id = '$year' group by year(a.inv_date)) as q inner join (SELECT count(*) as bcount,year(a.inv_date) as byear FROM `invoice_mst_13142` as a where a.party_id = '$all' group by year(a.inv_date)) as p on p.byear = q.ayear;";

}
$result = mysqli_query($conn, $sql);
if ($result == false) {
    echo "No table";
} else if (mysqli_num_rows($result) > 0) {
    $r = array();
    while ($row = mysqli_fetch_array($result)) {
        $r[] = $row;
        
    }
    echo json_encode($r);
} else {
    
    
    echo "nodata";
}

?>