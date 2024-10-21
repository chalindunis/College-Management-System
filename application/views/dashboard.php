<?php include("inc/header.php");?>
	<div class="container">
        <h3>ADMIN DASHBOARD</h3>
        <?php $username = $this->session->userdata('username');?>
        <p>Welcome, <?php echo $username;?></p>

        <?php echo anchor("admin/addCollege", "ADD COLLEGE", ['class'=>'btn btn-primary'])?>
        <?php echo anchor("admin/addStudents", "ADD STUDENT", ['class'=>'btn btn-primary'])?>
        <?php echo anchor("admin/addCoAdmin", "ADD CO-ADMIN", ['class'=>'btn btn-primary'])?> 

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
                <?php if(!empty($users)): ?> <!--get database college data to update the table -->
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user->college_id; ?></td>
                            <td><?php echo $user->collegename; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->rolename; ?></td>
                            <td><?php echo $user->gender; ?></td>
                            <td><?php echo $user->location; ?></td>
                            <td>
                                <?php echo anchor("college/edit/1", "Edit", ['class'=>'btn btn-warning'])?>
                                <?php echo anchor("college/delete/1", "Delete", ['class'=>'btn btn-danger'])?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>

    </div>

<?php include("inc/footer.php");?>
