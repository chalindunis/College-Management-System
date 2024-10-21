<?php include("inc/header.php");?>
	<div class="container">
        
        <?php echo form_open("admin/createStudent", ['class' => 'form-horizontal']);?>
        <?php if($msg =$this->session->flashdata('message')):?>
            <div class="row">
                <div class="col-md-6">
                    <div class ="alert alert-dismissible alert-success"> <!--//alert message shown in green bgrnd-->
                        <?php echo $msg;?>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <h4>ADD STUDENT</h4>
        <hr>
        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Student Name</label>
                    <div class="col-md-12">
                        <?php echo form_input(['name'=>'studentname', 'class'=>'form-control', 'placeholder'=>'Student Name', 'value'=>set_value('studentname')]);?>  
                        <!-- 'value'=>set_value('username') is for keeping the field value after submit and when error occurs -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo form_error('studentname','<div class="text-danger">','</div>');?>
            </div>
        </div>


        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-12">
                        <?php echo form_input(['name'=>'email', 'class'=>'form-control', 'placeholder'=>'Email', 'value'=>set_value('email')]);?>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                    <?php echo form_error('email','<div class="text-danger">','</div>');?>
            </div>
        </div>

        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Gender</label>
                    <select class="col-md-12" name="gender">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                    <?php echo form_error('gender','<div class="text-danger">','</div>');?>
            </div>
        </div>

        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">College</label>
                    <select class="col-md-12" name="college_id">
                       <option value="">Select</option>
                       <!-- fetch database data to the dropdown -->
                       <?php if (count($colleges)):?> 
                            <?php foreach($colleges as $college):?>
                        <option value=<?php echo $college->college_id?>><?php echo $college->collegename?></option>
                        <?php endforeach;?>
                        <?php endif;?>

                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                    <?php echo form_error('college_id','<div class="text-danger">','</div>');?>
            </div>
        </div>


        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Course</label>
                    <div class="col-md-12">
                        <?php echo form_input(['name'=>'course', 'class'=>'form-control', 'placeholder'=>'Course', 'value'=>set_value('course')]);?>  
        <!-- 'value'=>set_value('username') is for keeping the field value after submit and when error occurs -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo form_error('course','<div class="text-danger">','</div>');?>
            </div>
        </div>
<!-- 
        <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Document</label>
                    <div class="col-md-12">
                        <?php echo form_upload(['name'=>'student_document', 'class'=>'form-control']);?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo form_error('student_document','<div class="text-danger">','</div>');?>
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary">ADD</button>
        <?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']);?>
    
        <?php echo form_close();?>
    </div>

<?php include("inc/footer.php");?>