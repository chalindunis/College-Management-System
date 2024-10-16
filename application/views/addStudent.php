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


        <!-- <div class ="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Location</label>
                    <div class="col-md-12">
                        <?php echo form_input(['name'=>'location', 'class'=>'form-control', 'placeholder'=>'Location', 'value'=>set_value('location')]);?>  
        --><!-- 'value'=>set_value('username') is for keeping the field value after submit and when error occurs --><!--
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo form_error('location','<div class="text-danger">','</div>');?>
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary">ADD</button>
        <?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']);?>
    
        <?php echo form_close();?>
    </div>

<?php include("inc/footer.php");?>