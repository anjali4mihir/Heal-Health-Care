<style type="text/css">
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 4px;
}
</style>
<table>
	<tbody>
    <tr>
        <th><strong>Category</strong></th>
        <td><?= $data['category_name']; ?></td>
    </tr>
    <tr>
        <th><strong>Profile Image</strong></th>
        <td>
            <?php if($storedata->profile != ''){ ?> 
            <img src="<?= partner_image($data['id']) ?>" height="100px" width="100px"/>
            <?php } ?>
        </td>
    </tr>
    <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?> 
    <tr>
        <th><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab';} ?> Name</strong></th>
        <td><?= $storedata->store_name; ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th><strong><?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ echo 'Owner' ;} ?> Name</strong></th>
        <td><?= $storedata->name; ?></td>
    </tr>
    <tr>
        <th><strong><?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ echo 'Owner' ;} ?> Gender</strong></th>
        <td><?= $storedata->gender; ?></td>
    </tr>
    <?php if($data['category'] == 1 ){ ?>
    <tr>
        <th><strong>Qualification</strong></th>
        <td><?= $storedata->qualification; ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th><strong>Email Id</strong></th>
        <td><?= $data['email']; ?></td>
    </tr>
    <tr>
        <th><strong>Password</strong></th>
        <td><?= $data['org_password']; ?></td>
    </tr>
    <tr>
        <th><strong>Contact No</strong></th>
        <td><?= $data['contact_no']; ?></td>
    </tr>
    <tr>
        <th><strong>Address</strong></th>
        <td><?= $data['address']; ?></td>
    </tr>
    <tr>
        <th><strong>City</strong></th>
        <td><?= $data['city']; ?></td>
    </tr>
    <?php if($data['category'] == 4 || $data['category'] == 5 || $data['category'] == 6 || $data['category'] == 7){ ?>
    <tr>
        <th><strong>Pincode</strong></th>
        <td><?= $data['pincode']; ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th><strong>State</strong></th>
        <td><?= $data['state']; ?></td>
    </tr>
    <tr>
        <th><strong>Country</strong></th>
        <td><?= $data['country']; ?></td>
    </tr>
    <?php if($data['category'] == 4 || $data['category'] == 5 || $data['category'] == 6 || $data['category'] == 7){ ?>
    <tr>
        <th><strong>Google Map Link</strong></th>
        <td><?= $storedata->map_link; ?></td>
    </tr>
    <?php } ?>
    <?php if($data['category'] != 1 ){ ?>
    <tr>
        <th><strong>Qulification</strong></th>
        <td><b>College:</b><?= $storedata->ug_college; ?>  <b>University:</b><?= $storedata->ug_uni; ?>  <b>Passing Year:</b><?= $storedata->ug_year; ?></td>
    </tr>
    <tr>
        <th><strong>Registration</strong></th>
        <td><b>MCI:</b><?= $storedata->ug_mci; ?> <b>Reg.NO:</b><?= $storedata->ug_reg_no; ?> <b>Year:</b><?= $storedata->ug_mci_year; ?></td>
    </tr>
    <?php if($data['category'] == 4 || $data['category'] == 5 || $data['category'] == 6 || $data['category'] == 7){ ?>
    <tr>
        <th><strong>Work Experince</strong></th>
        <td>
            <table>
                <thead>
                <tr>
                    <th>SR.No</th>
                    <th>Company Name</th>
                    <th>Desingination</th>
                    <th>Exp. Year</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                if(isset($partner_work_exp) && count($partner_work_exp) > 0){
                $i=0; 
                foreach ($partner_work_exp as$key => $category) {  ?>
                    <?php if($category->Companyname != '' && $category->Designation != '' && $category->Exp_Year != ''){ ?> 
                    <tr>
                        <td><?php echo $category->Rowno; ?></td>
                        <td><?php echo $category->Companyname; ?></td> 
                        <td><?php echo $category->Designation; ?></td>
                        <td><?php echo $category->Exp_Year; ?></td>
                    </tr>
                    <?php  } ?>
                <?php
                $i++; }
                } else { ?>
                    <tr><td colspan="4"><center>Not Found</center></td></tr>
                <?php } ?>
                </tbody>
            </table>
        </td>
    </tr>
    <?php } ?>
<?php } ?>
    <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?>
        <?php if(!empty($storetiming)){ ?> 
        <tr>
            <th><strong>Open Timing</strong></th>
            <td>
                <table>
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                    for($i=0; $i < count($storetiming);$i++)
                    {  ?>
                      <tr>
                      <td><?= $storetiming[$i]['day'] ?></td>
                      <td><?= $storetiming[$i]['str_time'] ?></td>
                      <td><?= $storetiming[$i]['end_time'] ?></td>
                      </tr>
                   <?php  }
                    ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <?php } ?>
        <?php if($storedata->description != '') {?> 
        <tr>
            <th><strong>Comments</strong></th>
            <td><?= $storedata->description; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th><strong>GSTIN</strong></th>
            <td><?= $storedata->gstin; ?></td>
        </tr>
        <?php if($data['category'] == 1 ){ ?>
        <tr>
            <th><strong>Licence No</strong></th>
            <td><?= $storedata->licence_no; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab' ;} ?> Images</strong></th>
            <?php  $returnpath = $this->config->item('store_images_uploaded_path'); ?>
            <td>
                <?php if($returnpath != ''){ 
                foreach($store_images as $k=>$cd) {?>
                <img src="<?php echo $returnpath.$cd->images; ?>" class="img-thumbnail viewImage" height="70" width="70" />
                
                <?php } } ?>
            </td>
        </tr>
        <?php } ?>
        <?php if($storedata->pan != ''){ ?> 
        <tr>
            <th><strong>Pancard No</strong></th>
            <td><?= $storedata->pan; ?></td>
        </tr>
        <?php } ?>
        <?php if($storedata->adharcard_no != ''){ ?> 
        <tr>
            <th><strong>Adhaar Card No</strong></th>
            <td><?= $storedata->adharcard_no; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th><strong><?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ echo 'Owner' ;} ?> ID Proof</strong></th>
            <?php  $returnpath = $this->config->item('pancard_images_uploaded_path'); ?>
            <td>
            <?php if($storedata->pancard != ''){if($returnpath != ''){ ?>
                <img src="<?php echo $returnpath.$storedata->pancard; ?>" class="img-thumbnail viewImage" height="70" width="70" id="pancard" onclick="showimg('pancard')"/>
            <?php } } ?>
            </td>
        </tr>
        
        <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?>
        <tr>
            <th><strong>Sign-Board</strong></th>
            <?php  $returnpath = $this->config->item('sign_board_images_uploaded_path'); ?>
            <td>
                <?php if($storedata->sign_board != '') {?> 
                <img src="<?php echo $returnpath.$storedata->sign_board; ?>" class="img-thumbnail viewImage" height="70" width="70" id="signboardimage" onclick="showimg('signboardimage')" />
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th><strong>GSTIN Certificate</strong></th>
            <?php  $returnpath = $this->config->item('gst_certificate_images_uploaded_path'); ?>
            <td>
                <?php if($storedata->gstin_certificate != ''){ ?> 
                <img src="<?php echo $returnpath.$storedata->gstin_certificate; ?>" class="img-thumbnail viewImage" height="70" width="70" id="gstinimage" onclick="showimg('gstinimage')" /> <?php } ?>
            </td>
        </tr>
        <?php if($data['category'] == 1 ){ ?>
        <tr>
            <th scope="row" width="25%"><strong>B.PHARM Licence</strong></th>
            <?php  $returnpath = $this->config->item('bpharm_lience_images_uploaded_path'); ?>
            <td width="75%">
                <?php if($storedata->bpharm_licence != ''){ ?> 
                <img src="<?php echo $returnpath.$storedata->bpharm_licence; ?>" class="img-thumbnail " height="70" width="70" id="bpharmlicenceimg" onclick="showimg('bpharmlicenceimg')" /><?php } ?>
            </td>
        </tr>
        <?php if($storedata->degree_certificate !=' '){ ?> 
        <tr>
            <th scope="row" width="25%"><strong>B.PHARM/M.PHARM Degree Certificate</strong></th>
            <?php  $returnpath = $this->config->item('degree_certi_images_uploaded_path'); ?>
            <td width="75%">
                <?php if($storedata->degree_certificate != ''){ ?> 
                <img src="<?php echo $returnpath.$storedata->degree_certificate; ?>" class="img-thumbnail" height="70" width="70" class="viewImage" id="bpharmcertiimg" onclick="showimg('bpharmcertiimg')"/>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <?php if($storedata->corporation !=' '){ ?> 
        <tr>
            <th scope="row" width="25%"><strong>Corporation Registration</strong></th>
            <?php  $returnpath = $this->config->item('corporation_images_uploaded_path'); ?>
            <td width="75%">
                <?php if($storedata->corporation != ''){ ?> 
                <img src="<?php echo $returnpath.$storedata->corporation; ?>" class="img-thumbnail viewImage" height="70" width="70" id="corporationimg" onclick="showimg('corporationimg')"/>
            <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php if($data['category'] != 1) { ?>
        <?php if($storedata->ug_certificate !=' '){ ?>    
        <tr>
            <th scope="row" width="25%"><strong>Degree Certificate</strong></th>
            <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
            <td width="75%">
            <?php if($storedata->ug_certificate != ''){ 
                if($returnpath != ''){ ?>
                <img src="<?php echo $returnpath.$storedata->ug_certificate; ?>" class="img-thumbnail viewImage" height="70" width="70" id="ug_certi_img" onclick="showimg('ug_certi_img')" /> 
            <?php } } ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th scope="row" width="25%"><strong>Registration Certificate</strong></th>
            <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
            <td width="75%">
            <?php
            if($storedata->ug_mci_certificate != ''){  
            if($returnpath != ''){ ?>
                <img src="<?php echo $returnpath.$storedata->ug_mci_certificate; ?>" class="img-thumbnail viewImage" height="70" width="70" id="ug_mci_img" onclick="showimg('ug_mci_img')" />  
            <?php } } ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th scope="row" width="25%"><strong>Registered Date</strong></th>
            <td width="75%"><?= $data['created_at']; ?></td>
        </tr>
    </tbody>	
</table>