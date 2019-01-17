<style>
    p {
        margin: 0 0 0px;
    }
</style>
<p><?php echo $this->session->flashdata('verify_msg'); ?></p>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <?php $attributes = array("name" => "registrationform",'id'=>'registrationform', "role" => "form" ,"enctype"=>"multipart/form-data");
                    echo form_open("users/register", $attributes);?>
                    <fieldset>

                        <div class="form-group <?php echo form_error('firstname') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('firstname'); ?></label>
                            <input required class="form-control" placeholder="Enter First Name" name="firstname" type="text" value="<?php echo set_value('firstname'); ?>" autofocus>
                        </div>

                        <div class="form-group <?php echo form_error('lastname') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('lastname'); ?></label>
                            <input required class="form-control" placeholder="Enter Last Name" name="lastname" type="text" value="<?php echo set_value('lastname'); ?>">
                        </div>

                        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('email'); ?></label>
                            <input required class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email'); ?>">
                        </div>

                        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                            <input required class="form-control" placeholder="Password" name="password" type="password" value="" id="password">
                        </div>

                        <div class="form-group <?php echo form_error('cpassword') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('cpassword'); ?></label>
                            <input required class="form-control" placeholder="Confirm Password" name="cpassword" type="password" value="">
                        </div>
			<div class="form-group <?php echo form_error('gender') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('gender'); ?></label>
<label for="" class="col-form-label">Gender</label>
                             		 <input type="radio" name="gender" value="male" required> Male
					  <input type="radio" name="gender" value="female"> Female
					  <input type="radio" name="gender" value="other"> Other
                        </div>
				<div class="form-group <?php echo form_error('mobile') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('mobile'); ?></label>
				<label for="" class="col-form-label">Mobile </label>
                             		<input required id="mobile" pattern="[0-9]{10,11}"  maxlength="11" class="form-control" type="tel" name="mobile" value="" >
                        </div>
			 <div class="form-group <?php echo form_error('picture') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('picture'); ?></label>
                            <input type="file" id="picture" name="picture" class="form-control" onchange="previewFile()"/>
                        </div>

                        <button class="btn btn-success btn-block" name='register' type="submit" value="register">Register</button>
                        <div style="padding-top: 10px;">
                            <a href=""><label style="cursor: pointer;">Forgot Password</label></a> <a href="<?php echo site_url('/users/login');?>" class="pull-right"><label style="cursor: pointer;">Login</label></a>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="text-success"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p class="text-success"><?php echo $this->session->flashdata('msg_error'); ?></p>
<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js" type="text/javascript"></script>
<script>

	$("#registrationform").validate({
	rules: {
		
		email: {
			required: true,
			email:true,
			/* remote: {
				url: "<?php //echo site_url("/jobseeker_login/check_valid_email");?>",
				type: "post",
				data: {
				email: function() {
					return $( "#email" ).val();
				}
				}
			}, */
		},		
		password: {
			required: true,
			minlength:8,
		},
		cpassword: {
			equalTo:"#password",
		},
		firstname: {
           required: true,
		},
		lastname: {
			required: true,
		},
		mobile: {
			required: true,
			number:true,
			pattern: /^[1-9]{1}[0-9]{9}$/,
		},
	gender: {
           required: true,
		},
		picture: {
			required:true,
			//extension:"jpg|doc|docx"
            //extension:"csv|xls|xlsx"
        },
	
	},
	messages: {
		
		email: {
			required: "Please enter email ID",
			email:"Please enter valid email ID",
			//remote:"Email is not valid, Please enter genuine email address",
		},
		password: {
			required: "Please enter password",
			minlength:"Password must be minimum 8 characters long",
		},
		cpassword: {
			equalTo:"Password does not match with above password",
		},
		firstname: {
			required: "Please enter first name",
		},
		lastname: {
			required: "Please enter last name",
		},
		mobile: {
			required: "Please enter mobile number",
			number: "Please enter valid mobile number",
			
		},
		gender: {
			required: "Please Select Gender",
		},
		picture: {
			required:"Please upload Photo",
            //extension:"Please select a valid doc/docx/pdf file.",
        }, 
		
	},               
});

     $(document).ready(function() {

       $(".education_form").on("submit", function (e) {
    e.preventDefault();
    //var form = $("#education_form");
        var jobseeker_id = $("#jobseeker_id").val();
    var formData = new FormData(this);
    $.ajax({
        url: "<?php echo base_url().'jobseeker/update_education/';?>"+jobseeker_id,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        data: formData,
        success: function (response) {
        if(response.status == 'success'){
                                    swal({
                                          title: "Success",
                                          text: "Refresh in 2 seconds.",
                                          type: "success",
                                          timer: 2000,
                                          showConfirmButton: true
                                        }, function(){
                                               window.location.href = "<?php echo base_url().'jobseeker/education/';?>";
                                        });
                                 //swal(response.message, "", "success");
                                }
                                else{
                                    swal(response.message, "", "error");
                        }
                    //swal("Saved!", "", "success");
                },
                error: function () {
                    swal("Something went wrong!", "Please try again!", "error");
                }
            });
        });
    });

</script>
