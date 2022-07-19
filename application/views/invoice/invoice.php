<html lang="en">
 <head>
   <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    h1,h2,h3,h4,h5,h6{margin:0;}
    ul,li{margin:0;padding:0;list-style: none;}
    body{font-family: 'Poppins', sans-serif; }
    a{color:#004940;text-decoration: none;font-weight: 600;}
    a:hover,a:focus{color:#ed1c24;}
    p{margin:0;}
    .main-div{padding:30px;background-color: #fff;border:1px solid #eee;text-align: left;}
    .logo{text-align: left;margin-bottom: 25px;}
    .logo img{width:60px;}
    .title h3{font-size: 24px;margin-bottom:35px;}
    .recipt-info{padding-bottom:20px;border-bottom:1px solid #eee;}
    .recipt-info ul li{font-weight: 300;font-size: 16px;}
    .name-recipt{padding:20px 0;border-bottom: 1px solid #eee;}
    .name-recipt h4{font-weight: 600;font-size: 20px;line-height: normal;}
    .name-recipt h5{font-weight: 300;font-size: 16px;line-height: normal;}
    table{width:100%;}
    table tr td {border-bottom: 1px solid #eee;padding: 20px 0;font-weight: 400;}
    table tfoot tr td{font-weight: 700;}
    .notes{padding:30px 0;}
    .notes h6{font-size: 16px;font-weight: 600;margin-bottom:6px;margin-top:0;}
    .notes p{font-size: 15px;font-weight: 300;margin-bottom:0;margin-top:0;}
    footer{padding:30px;background-color: #f1faf8;}
    footer ul{margin-bottom:20px;}
    hr { padding: 10px 0; border: 0;border-bottom: 1px solid #eee;margin-bottom: 20px;}
    .footer-two {padding-top: 30px;width: 100%; display: inline-block;}
    .footer-two img{width:60px;margin-bottom: 10px;}
    .footer-left{width:79%;display: inline-block;}
    .footer-right{width:20%;display: inline-block;float: right;}
    .footer-right ul li{display: inline-block;padding:10px;background-color: #737373;border-radius: 5px;}
    .footer-right ul li a{color:#fff;}

  </style>
 </head> 
  <body style="width:1280px;text-align: center;">
    <div class="width-class" style="width:1100px;margin:0 auto;">
      <div class="main-div">
        <div class="logo">
          <img src="<?php echo $this->config->item('site_images_uploaded_path').$logo;?>" alt="" title="" style="width: 60px;">
        </div>
        <div class="title">
          <h3>Invoice cum payment receipt</h3>
        </div>
        <div class="recipt-info">
          <ul>
            <li>Invoice Number : <?= $Invoice_Number;?></li>
            <li>Consultation ID : <?= $Consultation_ID;?></li>
            <li>Date : <?= $Date;?></li>
            <li>Customer Name : <?= $patient_name;?></li>
            <li>Contact Number : <?= $patient_number;?></li>
          </ul>
        </div>
        <div class="name-recipt">
          <h4>Dr. <?= $doctor_name;?></h4>
          <h5><?= $clinic_name;?></h5>
          <?php /* <h5><?= $consulation_type;?></h5> */ ?>
        </div>
        <div class="price-table">
          <table>
            <tbody>
              <tr>
                <td><?= $consulation_name;?></td>
                <td style="text-align: right;">₹ <?= $final_amount;?></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>Total Amount Paid</td>
                <td style="text-align: right;">₹ <?= $final_amount;?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="notes">
          <h6>Issued on behalf of</h6>
          <p><?= $issued_by;?></p>
        </div>
        <footer>
          <ul>
            <li>PAN - <?= $pan_number;?></li>
            <li>GST Regn No - <?= $gst_number;?></li>
            <li>CIN - <?= $cin_number;?></li>
          </ul>
          <p>The invoice will be available in your @heal account.</p>
          <p>Healthcare services exempt from GST.</p>
          <p>You're receiving this email because this email address was entered for an online consultation. If you'd like to stop further communication and delink this account, please write to us at <a href="mailto:<?= $header_email;?>"><?= $header_email;?></a></p>
          <hr>
          <div class="footer-two">
            <div class="footer-left">
              <img src="<?php echo $this->config->item('site_images_uploaded_path').$logo;?>" alt="demo" title="" style="width: 60px;">
              <p>Contact: +91 <?= $help_line;?> or <a href="mailto:<?= $header_email;?>"><?= $header_email;?></a></p>
            </div>
          <?php /* <div class="footer-right" style="float: right;">
              <p>Follow us at</p>
              <ul>
                <?php if(isset($social_media) && !empty($social_media) && count($social_media) > 0)
                { 
                  foreach ($social_media as $value) { ?>
                  <li><a href="<?= $value['link'];?>"><i class="fa fa-<?= strtolower($value['name']);?>" aria-hidden="true"></i></a></li>
                <?php } }  ?>
              </ul>
            </div> */ ?>
          </div>
        </footer>
      </div>
    </div>
  <!-- </body>
</html> -->