<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?= $page_title?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets\admin\css\invoice.css">
  </head>
  <?php // dd($pharmcydata); ?>
  <body>
    <div class="main-width">
      <div class="header-right-part">
        <h3><?= $pharmcydata['store_name'] ?></h3>
        <ul>
          <?php if($pharmcydata['address'] != '') { ?>
          <li><span>Address :</span> <?= $pharmcydata['address'];
          if($pharmcydata['city'] != '') {
          $pharmcydata['city_name'];
          } ?></li>
          <?php } ?>
          <?php if($pharmcydata['gstin'] != ''){ ?> 
          <li><span>GST No :</span> <?= $pharmcydata['gstin'] ?></li>
          <?php } ?>

          <?php if(isset($category_id) && $category_id ==1) {  ?>
            <li><span>DL No :</span> <?= $pharmcydata['licence_no'] ?></li>
          <?php } ?> 
        </ul>
      </div>
    </div>
    <div class="shipping-client">
      <div class="shipping-client-left">
        <ul>
          <?php if($reportdata['category'] == 1){ ?>
          <li><span>Order Id :</span> <?=$reportdata['order_id']?></li>
          <li><span>Order Date :</span> <?= $reportdata['created_at']; ?></li>
        <?php } else { ?>
          <li><span>Booking Id :</span> <?=$reportdata['order_id']?></li>
          <li><span>Booking Date :</span> <?= $reportdata['created_at']; ?></li>
        
        <?php } ?>
        
          
          <?php if($reportdata['reference_doctor'] != '') { ?> 
          <li><span>Ref.Doctor Name :</span> <?= $reportdata['reference_doctor']?></li><?php } ?>
        </ul>
      </div>
      <div class="shipping-client-right">
        <ul>
          <li><h3><span>Patient Details :</span> <?= $reportdata['name']; ?></h3></li>
          <?php if(!empty($reportdata['address']) && $reportdata['address'] != '') { ?>
          <li><span>Address :</span> <?= $reportdata['address'];?></li>
          <?php } ?>
          <li><span>Phone :</span> <?= $reportdata['country_code'].$reportdata['mobile_no']; ?></li>
        </ul>
      </div>
    </div>
    <div class="price-table">
      <table class="table" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <?php if($reportdata['category'] == 1){ ?> 
            <th scope="col" style="width:20%;text-align:left;">Item Name</th>
          <?php } else if($reportdata['category'] == 2 || $reportdata['category'] == 3 ){ ?>
            <th scope="col" style="width:20%;text-align:left;">Report Name</th>
          <?php } ?>
            <?php if($reportdata['category'] == 1){ ?> 
            <th scope="col" style="width:10%;text-align:left;">Batch</th>
            <th scope="col" style="width:7%;text-align:left;">EXP.</th>
            <th scope="col" style="width:7%;text-align:left;">QTY</th>
            <?php } ?>
            <th scope="col" style="width:7%;text-align:left;">Amt</th>
            <th scope="col" style="width:7%;text-align:left;">CGST%</th>
            <th scope="col" style="width:7%;text-align:left;">CGSTAmt.</th>
            <th scope="col" style="width:7%;text-align:left;">SGST%</th>
            <th scope="col" style="width:7%;text-align:left;">SGSTAmt.</th>
            <th scope="col" style="width:7%;text-align:left;">DI%</th>
            <th scope="col" style="width:7%;text-align:left;">DIAmt.</th>
               <?php if($reportdata['category'] == 1){ ?> 
            <th scope="col" style="width:7%;text-align:left;">Final&nbsp;Amt</th>
             <?php } else if($reportdata['category'] == 2 || $reportdata['category'] == 3){ ?> 
              <th scope="col" style="width:7%;text-align:left;">Charges</th>
             <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php 

            $rowno = 1;
            $cgst_total = $sgst_total = $discount_total = $amount_total = 0;
            foreach($items as $k=> $row1)
            { 
              if($reportdata['category'] == 1){
                $row = unserialize($row1['medicine_serialize']);
                $total = $row['medicine_qty'] * $row['total'];
              }else{
                $row = unserialize($row1['test_serialize']);
                $row['mrp'] = $row1['mrp'];
                $row['sale_price'] = $row1['sale_price'];
                $row['discount_per'] = $row1['discount_per'];
                $row['discount'] = $row1['discount'];
                $row['gst_per'] = $row1['gst_per'];
                $row['gst'] = $row1['gst'];
                $total = $row1['total'];
              }

        //        echo "<pre>";
        // print_r($row);
        // echo "</pre>";
         ?>
          <tr>
          	
            	<td>
                <?php if(isset($row['name']) && !empty($row['name'])){ ?>
                <?= strtoupper($row['name']); ?>
                <?php } ?>
                <?php if(isset($row['manufacture_name']) && !empty($row['manufacture_name'])){ ?>
                <br>( <?= strtoupper($row['manufacture_name']); ?> )
                <?php } ?>
                  
                </td>
            
            <?php if($reportdata['category'] == 1){ ?> 
            
            	<td scope="col"><?php if(isset($row['batch_no']) && !empty($row['batch_no'])){ ?><?= $row['batch_no'] ?><?php } ?></td>
            
            
            	<td scope="col"><?php if(isset($row['expiray_date']) && !empty($row['expiray_date'])){ ?><?php echo date('d-m-Y',strtotime($row['expiray_date'])); ?><?php } ?></td>
            
            
            	<td scope="col"><?php if(isset($row['medicine_qty']) && !empty($row['medicine_qty'])){ ?><?php echo $row['medicine_qty']; ?><?php } ?></td>
            
            <?php } ?>
           
            	<td scope="col"><?php if(isset($row['mrp']) && !empty($row['mrp'])){ ?><?php echo number_format((float)$row['mrp'], 2, '.', ''); ?><?php } ?></td>
              

              <td scope="col"> <?php if(isset($row['gst_per']) && !empty($row['gst_per'])){ ?><?php echo number_format((float)($row['gst_per']/2), 1, '.', ''); ?> <?php } ?></td>
           
            
              <td scope="col"><?php if(isset($row['gst']) && !empty($row['gst'])){ ?><?php echo number_format((float)($row['gst']/2), 2, '.', ''); ?> <?php } ?></td>
              
              <?php 
                $cgst_total = $cgst_total + (float)($row['gst']/2);
                $sgst_total = $sgst_total + (float)($row['gst']/2);
                $discount_total = $discount_total + (float)($row['discount']/2);
                $amount_total = $amount_total + (float)$total;
              ?>

              <td scope="col"> <?php if(isset($row['gst_per']) && !empty($row['gst_per'])){ ?><?php echo number_format((float)($row['gst_per']/2), 1, '.', ''); ?><?php } ?></td>
            
            
              <td scope="col"><?php if(isset($row['gst']) && !empty($row['gst'])){ ?><?php echo number_format((float)($row['gst']/2), 2, '.', ''); ?><?php } ?></td>
            

            	<td scope="col"> <?php if(isset($row['discount_per']) && !empty($row['discount_per'])){ ?><?php echo number_format((float)$row['discount_per'], 1, '.', ''); ?><?php } ?></td>

               <td scope="col"> <?php if(isset($row['discount']) && !empty($row['discount'])){ ?><?php echo number_format((float)$row['discount'], 1, '.', ''); ?><?php } ?></td>
            
            	<td scope="col"><?php if(isset($total) && !empty($total)){ ?><?php echo number_format((float)$total, 2, '.', ''); ?><?php } ?></td>
            
          </tr>
          <?php $rowno++; } ?>
        </tbody>
      </table>
      <div style="width:100%;position:relative">
        <div class="note" style="width:300px;padding-top:60px;float:left;position:relative">
          <?php $symbolpath =  $this->config->item('symbol_images_uploaded_path'); 
          $stamppath = $this->config->item('stamp_images_uploaded_path'); ?>
          <div class="symbol-sign" style="width:20%;display:inline-block;">
            <img src="<?php echo $symbolpath.$pharmcydata['symbol']; ?>" alt="demo" style="text-align:center;margin:auto;float:left;">
          </div>
          <div class="stamp"  style="width:60%;display:inline-block;">
          <img src="<?php echo $stamppath.$pharmcydata['stamp']; ?>" alt="demo" style="text-align:center;margin:auto;margin-left:10px;flot:right;">
          </div>
          <h4>Authorized Signatory</h4>
        </div>
        <div id="sums" style="width:350px;float:right;">
          <table class="table table-bordered">
            <tr>
              <th>Total</th>
              <td><?php echo number_format((float)$final_amount['main_amount'], 2, '.', ''); ?></td>
            </tr>
            
            <tr>
              <th>CGST Amount</th>
              <td><?php echo number_format((float)($cgst_total), 2, '.', ''); ?></td>
            </tr>
            <tr data-iterate="tax">
              <th>SGST Amount</th>
              <td><?php echo number_format((float)($sgst_total), 2, '.', ''); ?></td>
            </tr>
            <tr data-iterate="tax">
              <th>Discount</th>
              <td><?php echo number_format((float)$final_amount['discount_amount'], 2, '.', ''); ?></td>
            </tr>

             


             
            <tr class="amount-total">
              <?php if($reportdata['category'] == 1){ ?>
              <th>Delivery Charge</th>
              <?php } if($reportdata['category'] == 2){ ?>
              <th>Sample Collection Charge</th>
              <?php } ?>
              <?php if($final_amount['delivery_type'] == 2) { ?>
              <td><?php echo number_format((float)$final_amount['delivery_charge'], 2, '.', ''); ?></td>
              <?php } else { ?>
              <td><?php echo number_format((float)0, 2, '.', ''); ?></td>
              <?php } ?>
            </tr>

            <tr class="amount-total">
              <th>Net Pyabale Amount </th>
              <td><?php echo number_format((float)$amount_total, 2, '.', ''); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="main-tankyou">
      <div class="thankyou">
        <h5><strong>Retun Policy :</strong> <?php echo $pharmcydata['return_policy']; ?></h5>
      </div>
      <div class="tankyou-two-logo">
        <img src="<?= base_url() ?>assets\img\logo.png" alt="demo" style="text-align:center;margin:auto;margin-left:50px;">
        <h6><span>Thank you!</span><br/>For Order With Us</h6>
      </div>
    </div>
  </body>
</html>

