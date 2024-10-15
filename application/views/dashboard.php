<?php include("inc/header.php");?>
	<div class="container">
                <h3>ADMIN DASHBOARD</h3>
                <?php $username = $this->session->userdata('username');?>
                <p>Welcome, <?php echo $username;?></p>

                <?php echo anchor("admin/addCollege", "ADD COLLEGE", ['class'=>'btn btn-primary'])?>
                <?php echo anchor("admin/addStudent", "ADD STUDENT", ['class'=>'btn btn-primary'])?>
                <?php echo anchor("admin/addCoadmin", "ADD CO-ADMIN", ['class'=>'btn btn-primary'])?>
        
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>College Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Example College</td>
                            <td>Example user</td>
                            <td>Example email</td>
                            <td>co admin</td>
                            <td>male</td>
                            <td>Example Location</td>
                            <td>
                                <?php echo anchor("college/edit/1", "Edit", ['class'=>'btn btn-warning'])?>
                                <?php echo anchor("college/delete/1", "Delete", ['class'=>'btn btn-danger'])?>
                            </td>
                        </tr>
                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>

        </div>

<?php include("inc/footer.php");?>
