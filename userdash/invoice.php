<?php include('menu.php');?>
 <style type="text/css">
   @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

:root {
  --primary-color: #f5826e;  
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
  letter-spacing: 0.5px;
}



.invoice-card {
  display: flex;
  flex-direction: column;
  position: absolute;
  padding: 10px 2em;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  min-height: 25em;
  width: 22em;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
}

.invoice-card > div {
  margin: 5px 0;
}

.invoice-title {
  flex: 3;
}

.invoice-title #date {
  display: block;
  margin: 8px 0;
  font-size: 12px;
}

.invoice-title #main-title {
  display: flex;
  justify-content: space-between;
  margin-top: 2em;
}

.invoice-title #main-title h4 {
  letter-spacing: 2.5px;
}

.invoice-title span {
  color: rgba(0, 0, 0, 0.4);
}

.invoice-details {
  flex: 1;
  border-top: 0.5px dashed grey;
  border-bottom: 0.5px dashed grey;
  display: flex;
  align-items: center;
}

.invoice-table {
  width: 100%;
  border-collapse: collapse;
}

.invoice-table thead tr td {
  font-size: 12px;
  letter-spacing: 1px;
  color: grey;
  padding: 8px 0;
}

.invoice-table thead tr td:nth-last-child(1),
.row-data td:nth-last-child(1),
.calc-row td:nth-last-child(1)
{
  text-align: right;
}

.invoice-table tbody tr td {
    padding: 8px 0;
    letter-spacing: 0;
}

.invoice-table .row-data #unit {
  text-align: center;
}

.invoice-table .row-data span {
  font-size: 13px;
  color: rgba(0, 0, 0, 0.6);
}

.invoice-footer {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.invoice-footer #later {
  margin-right: 5px;
}

.btn {
  border: none;
  padding: 5px 5px;
  background: none;
  cursor: pointer;
  letter-spacing: 1px;
  outline: none;
}

.btn.btn-secondary {
  color: red;
}



.btn#later {
  margin-right: 2em;
}


 </style>
<div class="invoice-card">
  <div class="invoice-title">
    <div id="main-title">
      <h4>INVOICE</h4>
      <span><?php echo $userid;?></span>
    </div>
    <?php $sql = mysqli_query($con, "select * from income_received where userid='$userid' order by id desc limit 1");
    $row = mysqli_fetch_array($sql);
    $date = $row['date'];
    $amt = $row['amount'];
     $tds = $row['tds'];
      $receive = $row['received'];
    ?>
    <span id="date"><?php echo $date?></span>
  </div>
  
  <div class="invoice-details">
    <table class="invoice-table">
      <thead>
        <tr>
          <td>AMOUNT</td>
          <td>TDS</td>
          <td>RECEIVED</td>
        </tr>
      </thead>
      
      <tbody>
        <tr class="row-data">
          <td><?php echo $amt?></td>
          <td><?php echo $tds?></td>
          <td><?php echo $receive?></td>
        </tr>
        
      </tbody>
    </table>
  </div>
  
  <div class="invoice-footer">
    <button class="btn btn-secondary" id="later">LATER</button>
    <button class="btn btn-primary">VIEW</button>
  </div>
</div>
 <?php include('flinks.php');?>