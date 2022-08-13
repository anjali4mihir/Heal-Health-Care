<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/medical-certificate.css">
  </head>
  <body>
    <section class="banner">
      <div class="logo">
        <img src="<?= base_url() ?>assets\img\logo.png" alt="demo" style="height: 120px;width: 120px;">
      </div>
      <div class="banner-right">
        <h4><?= $doctor_data['name'] ?></h4>
        <p><?= $doctor_data['ug_course']?></p>
        <p>Reg.No - <?= $doctor_data['ug_reg_no']?></p>
      </div>
    </section>
    <section class="content-body">
      <div class="contant-body-left">
        <h4><?= $patient_data['name'] ?></h4>
        
        <p><?= $patient_data['age'] ?> Year,<?= $patient_data['gender'] ?></p>
      </div>
      <div class="contant-body-right">
        <span><?= date("F j, Y"); ?></span>
      </div>
      <div class="hit">
        <div class="col-12">
          <div class="title-two">
            <h3>Medical Certificate</h3>
          </div>
          <?php if($patient_data['gender']=="Female"){ $data1 = "She"; $data2 = "Her"; $data3 = "Her";}else{ $data1 = "He"; $data2 = "His"; $data3 = "Him";} ?>
          <div class="report-box">
            <p>I Dr.<?= $doctor_data['name'] ?> after careful Examination Of This Patient Certify That <?= $patient_data['name'] ?> Was Suffering From <span><?= $message ?></span> and i Advised <?= $data3 ?> Complate Rest From <span><?= $from_date?></span> To <span><?= $to_date?>.</span><?= $data1; ?> is Now To Resume <?= $data2; ?> Duty.</p>
          </div>
          <div class="sign">
            <?php
              $imagepath = $this->config->item('signature_images_uploaded_path').$doctor_data['digital_sign'];
            ?>
            <?php if($imagepath != ''){
                    ?> 
                  <img src="<?=$imagepath?>" alt="demo" style="height: 100px; width: 100px;">
            <?php  } ?>
            <p>Signture</p>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>