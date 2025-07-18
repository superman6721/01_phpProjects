<?php require_once("./helper/head.php") ?>
<?php $strongPassStatus= false; ?>
<div class="container">
    <div class=' d-flex flex-column align-items-center justify-content-center '>

        <form action="" method='post' class='p-3 bg-gradient rounded shadow '>

            <h3 class='text-center text-primary '>Register Form</h3>

            <input type="text" class="form-control mt-3" placeholder='enter name...' name='name' 
            value="<?php 
                        if(isset($_POST['btn-submit']) ) { 
                            echo $_POST['name'] == "" ? "" : $_POST['name']; } 
                    ?>" >
            <?php
            if (isset($_POST['btn-submit'])) {
                $nameStatus = $_POST['name'] == "" ? false : true;
                echo $nameStatus ? "" : "<small class='text-danger'>name is required</small>";
             }
            ?>

            <input type="text" class="form-control mt-3" placeholder='enter phone number...' name='phNo' value="<?php 
                                    if(isset($_POST['btn-submit']) ) {
                                        echo $_POST['phNo'] == "" ? "" : $_POST['phNo']; } 
                                ?>">
            <?php
            if (isset($_POST['btn-submit'])) {
                $phNoStatus = $_POST['phNo'] == "" ? false : true;
                echo $phNoStatus ? "" : "<small class='text-danger'>phone number is required</small>";
             }
            ?>

            <div class="d-flex justify-content-around mt-3">
                <input type="number" class='form-control' placeholder='enter age...' name='age'
                value="<?php 
                            if(isset($_POST['btn-submit']) ) {
                                echo $_POST['age'] == "" ? "" : $_POST['age']; } 
                        ?>">
                <select name="gender" class='form-select ms-1'>
                    <option value="male" >male</option>
                    <option value="female" >female</option>
                </select>
            </div>
            <?php
                if (isset($_POST['btn-submit'])) {
                    $ageStatus = $_POST['age'] == "" ? false : true;
                    echo $ageStatus ? "" : "<small class='text-danger'>age is required</small>";
                }
            ?>

            <input type="text" class="form-control mt-3" placeholder='enter password...' name='password' value="<?php 
                                        if(isset($_POST['btn-submit']) ) {
                                            echo $_POST['password'] == "" ? "" : $_POST['password']; } 
                                    ?>">
            <?php
            if (isset($_POST['btn-submit'])) {
                $passwordStatus = $_POST['password'] == "" ? false : true;
                echo $passwordStatus ? "" : "<small class='text-danger'>password is required</small>";
             }
            ?>

            <input type="text" class="form-control mt-3" placeholder='comfirm password...' name='comfirmPassword' value="<?php 
                                                if(isset($_POST['btn-submit']) ) {
                                                    echo $_POST['comfirmPassword'] == "" ? "" : $_POST['comfirmPassword']; } 
                                                ?>">
            <?php
            if (isset($_POST['btn-submit'])) {
                $comfirmPasswordStatus = $_POST['comfirmPassword'] == "" ? false : true;
                // echo $_POST['password'] == $_POST['comfirmPassword'] ? "" : "<small class='text-danger'>password and comfirm must be same</small>";
                echo $comfirmPasswordStatus ? "" : "<small class='text-danger'>comfirm password is required</small>";
             }
            ?>

            <input type="submit" class="form-control mt-3 btn btn-primary" name='btn-submit'>
        </form>
          <?php
            if (isset($_POST['btn-submit'])) { 
                    $password = $_POST['password'];
                    $comfirmPassword = $_POST['comfirmPassword'];

                    $passwordLength = strlen($password )>=6;
                    $lowerCaseStatus = preg_match("/[a-z]/", $password);
                    $upperCaseStatus = preg_match("/[A-Z]/", $password);
                    $numberStatus = preg_match("/[0-9]/", $password);
                    $specialLatterStatus = preg_match("/[!@#$%^&*()]/", $password);
            if ($passwordStatus && $comfirmPassword) {        
                if ($password===$comfirmPassword ) {
                    if ($comfirmPasswordStatus && $passwordStatus && $lowerCaseStatus && $upperCaseStatus && $passwordLength && $numberStatus && $specialLatterStatus) {
                            echo "<small class='text-success'>Strong password!</small>";
                            $strongPassStatus = true;
                        } else {
                            if (!$passwordLength) { 
                                echo "<small class='text-danger'>Password must be at least 6 characters long.</small><br>";
                            } 
                            if (!$lowerCaseStatus) {
                                echo "<small class='text-danger'>Password must have at least one lowercase letter.</small><br>";
                            }
                            if (!$upperCaseStatus) {
                                echo "<small class='text-danger'>Password must have at least one uppercase letter.</small><br>";
                            }
                            if (!$numberStatus) {
                                echo "<small class='text-danger'>Password must have at least one number.</small><br>";
                            }
                            if (!$specialLatterStatus) {
                                echo "<small class='text-danger'>Password must have at least one special character (!@#$%^&*()).</small><br>";
                            }
                            $strongPassStatus= false;
                        }
                    } else {
                        echo "<samll class='text-danger'>password and comfirm password must be same.</small>";
                    }
                }
            }
        ?>
    </div>
</div>
<?php 
if (isset($_POST['btn-submit'])) {
    if ($nameStatus && $phNoStatus && $ageStatus && $passwordStatus && $comfirmPasswordStatus && $strongPassStatus) {
        require_once("./registerProcess.php");
    }

}


?>
<?php require_once("./helper/foot.php") ?>