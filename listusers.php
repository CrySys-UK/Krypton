<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

	require_once (__DIR__.'/core/functions/fnc_gtUsers.php');
	
	$user = new ListUser;
	$users = $user->fetch_all();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Krypton Users</h2>
                <?php foreach ($users as $user) { ?>
                    <a href="<?php echo $server_url?>/admin_list_users_edit.php?id=<?php echo $user['id']?>">
                        <?php echo $user['username']?>
                    </a>
                    <hr/>
                    <?php } ?>
            </div>
        </div>
    </div>
