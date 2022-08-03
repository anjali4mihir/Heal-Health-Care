<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                <div class="full_width contact-us">
                    <?php if (isset($error)) {echo $error;}echo $this->session->flashdata("message"); ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Description<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description" name="description"><?php echo $cms_page->desc_web; ?></textarea>
                            </div>
                        </div>
                        <?php if($cms_page->id == 1){ ?>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Description For App<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description_app" name="description_app"><?php echo $cms_page->desc_app; ?></textarea>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Description In Hindi<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description_hn" name="description_hn"><?php echo $cms_page->desc_hn; ?></textarea>
                            </div>
                        </div>
                        <?php if($cms_page->id == 1){ ?>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Short Description<span class="error">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="short_desc" name="short_desc"><?php echo $cms_page->short_desc; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Goal<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_goal" name="our_goal"><?php echo $cms_page->our_goal; ?></textarea>
                                </div>
                            </div><div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Goal For App<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_goal_app" name="our_goal_app"><?php echo $cms_page->our_goal_app; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Goal in Hindi<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_goal_hn" name="our_goal_hn"><?php echo $cms_page->our_goal_hn; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Mission<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_mission" name="our_mission"><?php echo $cms_page->our_mission; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Mission For app<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_mission_app" name="our_mission_app"><?php echo $cms_page->our_mission_app; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Mission In Hindi<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_mission_hn" name="our_mission_hn"><?php echo $cms_page->our_mission_hn; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Vision<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_vision" name="our_vision"><?php echo $cms_page->our_vision; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Vision For App<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_vision_app" name="our_vision_app"><?php echo $cms_page->our_vision_app; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Our Vision In Hindi<span class="error">*</span>
                                </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="our_vision_hn" name="our_vision_hn"><?php echo $cms_page->our_vision_hn; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input"
                                    class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="file" name="file" id="file" class="dropify"
                                        accept="image/*" />
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" id="save_button" class="btn btn-success">Update</button>
                                <a href="<?= base_url("cmspage"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('description');
CKEDITOR.replace('description_hn');
CKEDITOR.replace('description_app');
CKEDITOR.replace('our_vision');
CKEDITOR.replace('our_mission');
CKEDITOR.replace('our_goal');
CKEDITOR.replace('our_vision_hn');
CKEDITOR.replace('our_mission_hn');
CKEDITOR.replace('our_goal_hn');
CKEDITOR.replace('our_vision_app');
CKEDITOR.replace('our_mission_app');
CKEDITOR.replace('our_goal_app');
</script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
  $(function() {
    $("#form_edit").validate({
        rules: {
            short_desc:{required:true},
            description:{required:true},
            description_app:{
                required: function(){ return ('<?= $cms_page->id;  ?>' == 1);}
            },
            description_hn:{required:true},
            our_goal:{
                required: function(){ return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_goal_app:{
                required: function(){ return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_goal_hn:{
                required: function(){ return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_mission:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_mission_app:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_mission_hn:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_vision:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_vision_app:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);} 
            },
            our_vision_hn:{
                required: function(){return ('<?= $cms_page->id;  ?>' == 1);}
            }
        },
        messages: {
            short_desc:{ required:"Please enter short description"},
            description:{ required:"Please enter description"},
            description_app:{required:"Please enter description for app"},
            description_hn:{required:"Please enter description in hindi"},
            our_goal:{required:"Please enter goal"},
            our_goal_app:{required:"Please enter goal for app"},
            our_goal_hn:{required:"Please enter goal in hindi"},
            our_mission:{required:"Please enter mission"},
            our_mission_app:{required:"Please enter mission for app"},
            our_mission_hn:{required:"Please enter mission in hindi"},
            our_vision:{required:"Please enter vision"},
            our_vision_app:{required:"Please enter vision for app"},
            our_vision_hn:{required:"Please enter vision in hindi"},
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
    $('#save_button').click(function() {
        if($('#form_edit').valid()){
            $(this).attr('readonly', true);
            $(this).html('Saving...');
            $(this).parents('form').submit();
        }
    });
});
</script>