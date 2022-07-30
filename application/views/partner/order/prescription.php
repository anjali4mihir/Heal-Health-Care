  <html lang="en">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/medical-certificate.css">
    <body style="width: 375px;padding:0;margin:0;padding-left:15px;">
      <div class="width-class">
        <section class="banner">
          <div class="logo">
            <img src="<?= base_url(); ?>assets\img\logo.png" alt="demo" style="height: 120px;width: 120px;">
          </div>
          <div class="banner-right">
              <h4>Dr.<?= $doctor_data["name"]; ?></h4>
              <p><?= $doctor_data["ug_course"]; ?></p>
              <p>Reg.No - <?= $doctor_data["ug_reg_no"]; ?></p>
          </div>
        </section>
    <section class="content-body">
      <div class="contant-body-left">
        <h4><?= $patient_data['name'] ?></h4>
        
        <p><?= $patient_data['age'] ?> Year,<?= $patient_data['gender'] ?></p>
      </div>
      <div class="contant-body-right">
        <span><?= date("F j, Y"); ?></span>
        <div class="priscr-id">Prescription ID : #21202</div>
      </div>
      <div class="hit">
        <div class="col-12">
          <?php if($prescriptions_data['chief_complaints'] != ''){ ?> 
          <div class="title-two pb-10">
            <h3>Chief Compalaints</h3>
            <p><?= $prescriptions_data['chief_complaints']?></p>
          </div>
          <?php } ?>
          <?php if($prescriptions_data['medical_history'] != ''){ ?> 
          <div class="title-two pb-10">
            <h3>Medical History</h3>
            <p><?= $prescriptions_data['medical_history']?></p>
          </div>
          <?php } ?>
          <?php if($prescriptions_data['allergies'] != '') { ?> 
          <div class="title-two pb-10">
            <h3>Allergies</h3>
            <p><?= $prescriptions_data['allergies']?></p>
          </div>
          <?php } ?>
          <?php if(isset($medicine)){ 
            if(count($provisional_diagnosis) > 0){?> 
          <div class="title-two pb-10 title-new">
            <h3>Provisional Diagnosis</h3>
            <table>
              <tbody>
            <?php $i = 1; foreach ($provisional_diagnosis as $key => $row) {  ?>
              <tr>
                <td><?= $row['name'] ?><br/>
                <?php if(isset($row['notes']) && !empty($row['notes'])){ ?>
                  <span class="notes-title">Notes :</span><span class="notes-text"><?= $row['notes'] ?></span>
                <?php } ?>
                </td>
              </tr>
            <?php $i++; } ?>
           </tbody>
            </table> 
          </div>
          <?php } } ?>
          <?php if(isset($diagnostic_test)){ 
            if(count($diagnostic_test) > 0) { ?> 
          <div class="title-two pb-10 title-new">
            <h3>Diagnosis Test</h3>
            <table>
                <tbody>
                <?php $i= 1; foreach($diagnostic_test as $row) {  ?>
                  <tr>
                    <td><?= $row['name'] ?><br/>
                      <?php if(isset($row['notes']) && !empty($row['notes'])){ ?>
                      <span class="notes-title">Notes :</span> <span class="notes-text"><?= $row['notes'] ?>
                      </span>
                    <?php } ?>
                      <br/></td>
                  </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
          <?php } } ?>
          
          <?php if(isset($medicine)){  
            if(count($medicine) > 0){ ?> 
          <div class="title-two pb-10 title-new">
            <h3>Medicine</h3>
            <table class="medicin">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Dose</th>
                </tr>
              </thead>
              <tbody>
              <?php $i= 1; foreach($medicine as $row) {  
                $sql="Select company_name,generic_name from tbl_medicine where id='".$row['id']."'";
                $query = $this->db->query($sql);
                $row1 = $query->row_array();
               ?>
                <tr>
                  <td> <span class="notes-title"><?= $row['name'] ?></span><br>
                  <?php if(isset($row1['generic_name']) && !empty($row1['generic_name'])){ ?>
                  <span>Generic Name :</span><span><?= $row1['generic_name'] ?></span><br>
                  <?php } ?>  
                  <?php if(isset($row1['company_name']) && !empty($row1['company_name'])){ ?>
                  <span>Brand Name :</span><span><?= $row1['company_name'] ?></span><br>
                  <?php } ?>
                  </td>
                  <td><?= $row['description'] ?></td>
                </tr>
              <?php $i++; } ?>
              </tbody>
            </table>
          </div>
          <?php } } ?>
          <?php  if($prescriptions_data['general_advice'] != ''){  ?>
            <div class="title-two pb-10" style="margin-bottom:30px;">
              <h3>General Advice</h3>
              <p><?= $prescriptions_data['general_advice']?></p>
            </div>
          <?php } ?>
          
          <div class="sign">
            <?php
              $imagepath = $this->config->item('signature_images_uploaded_path').$doctor_data['digital_sign'];
            ?>
            <?php if($imagepath != ''){ ?>
                  <img src="<?=$imagepath?>" alt="demo" style="height: 100px; width: 100px;">
            <?php } 
              ?>
            <p>Signture</p>
          </div>
        </div>
      </div>
    </section>
    <section class="footer">Disclaimer : This prescription is based on the information provided by you in an online consulation and not on any physical Verification. visit a docotor in case of emergency. This Prescription Is valid in india only.</section>
  </div>
 </body>
</html>