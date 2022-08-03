<script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/admin/jQueryUI/jquery-ui.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.desktop.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.buttons.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.confirm.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.callbacks.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.animate.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.history.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.mobile.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\pnotify\js\pnotify.nonblock.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\sweetalert\js\sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\js\custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/admin\croppie\croppie.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    function nicescrollresize()
    {
        $("html").getNiceScroll().resize();
        $("#boxscroll").getNiceScroll().resize();
    }
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      elems.forEach(function(html) {
        var switchery = new Switchery(html,{secondaryColor: '#FF5E5E', jackSecondaryColor: '#fff'});
      });
</script>
<script>
$(document).ready( function () {
    $('#example23').DataTable();
});

$(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });
$(function () {
        $("body").on("change", ".tgl_checkbox", function () {
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin = 0;
            if ($(this).is(':checked')) {
                bin = 1;
            }
            $.ajax({
                method: "POST",
                url: "<?php echo site_url('admin/change_status'); ?>",
                data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
            })
            .done(function (msg) {
                if (msg == '1') {
                    $("#myElem").show();
                    setTimeout(function () {
                        $("#myElem").hide();
                    }, 3000);

                } else if (msg == '0') {
                    $("#myElemNo").show();
                    setTimeout(function () {
                        $("#myElemNo").hide();
                    }, 3000);
                }
            });
        });
    });
</script>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="confirm-delete" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h4>Delete Record ?</h4></div>
            <div class="modal-body"><p>Are you sure you want to delete this record ?</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><a class="btn btn-danger btn-ok" id="_confirm_del_link">Delete</a></div>
        </div>
    </div>
</div>

<div data-backdrop="static" data-keyboard="false" class="modal fade" id="edit_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Reason for reject order ?</h4></div>
            <div class="modal-body">
                <form action="" method="post" name="reason_form" id="reason_form">
                <input type="text" name="reason" id="reason" class="form-control" required>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-info" id="save_button" name="save_button" value="Reject">Reject</button>

        </div>
        </div>
    </div>
</div>


<script>
function confirm_delete(urlLink) {
        $('#confirm-delete').modal('show');
        $('#_confirm_del_link').attr('href', urlLink);
    }
    
    function view_edit_popup(url) {
        $('#edit_popup').modal('show');
        $('#_edit_popup_link').attr('href', url);
        $('#reason_form').attr('action', url);
    }

$(function() {
    $("#reason_form").validate({
        rules: {
            reason:{
                required:true,
            },
        },
        messages: {
            reason:{ required:"Please enter reson for reject order"},
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
});

</script>
<script>

setInterval(function() {
    if (<?=$_SESSION['usercategory']; ?> == 1) {
        //load_notification_pnotify();
    }
}, 5000);
function load_notification_pnotify(view = '') {
    update_notification = '';
    var html = "";
    $.ajax({
        method: "POST",
        url: "<?= base_url('notification/fetch_notification'); ?>",
        data: {
            view: view
        },
        dataType: "json",
        success: function(data) {
            
            for (var i = 0; i < data.notification_toast.length; i++) {
                var read_id = data.notification_toast[i].id;
                var title = data.notification_toast[i].title;
                var message = data.notification_toast[i].description;
                var order_no = data.notification_toast[i].order_no;
                var order_id = data.notification_toast[i].order_id;
                
                var html = '<div><i class="fa fa-bell"></i> <b>' + title + ' :</b> ' + message +'<a href="<?= base_url().'orders/view/'; ?>'+order_no+'"> <span>'+order_id+'</span></a></div>';

                PNOTY(html, 'info');
            }
        }
    });
}
</script>
</body>
</html>