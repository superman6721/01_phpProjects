<?php require_once("../helper/head.php") ?>
<?php require_once("./dbconnection.php") ?>

    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center">

            <form action="" class='p-3 bg-gradient shadow rounded' style='width:350px' method='post'>
                <h3 class='text-center text-primary'>Login Form</h3>
                <input type="text" class='form-control mt-3' placeholder='enter user name...' name='name' value="<?php
                if(isset($_POST['btn-login'])) {echo $_POST['name'] == "" ? "" : $_POST['name'];} ?>">
                   <?php
                    if (isset($_POST['btn-login'])) {
                        $nameStatus = $_POST['name'] == "" ? false : true;
                        echo $nameStatus ? "" : "<small class='text-danger'>name is required</small>";
                        }
                    ?>
                <input type="text" class='form-control mt-3' placeholder='enter password...' name='password'>
                  <?php
                    if (isset($_POST['btn-login'])) {
                        $passwordStatus = $_POST['password'] == "" ? false : true;
                        echo $passwordStatus ? "" : "<small class='text-danger'>password is required</small>";
                        }
                    ?>
                <input type="submit" class='form-control mt-3 btn btn-primary' name='btn-login'>
            </form>
        </div>          
    </div>
<?php 
if (isset($_POST['btn-login']) ) {
    echo "<pre>";
    print_r($_POST);

    if ($nameStatus && $passwordStatus ) {
        $query = "SELECT name, password FROM userInfo";
        $res = $pdo->prepare($query);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $item) {
            $isNameFound = $_POST['name'] == $item['name'];
            if ($isNameFound) {
                if ($_POST['password'] == $item['password']) {
                    header("Location:./homePage.php?name=".$item['name']."");
                } else {
                    echo 'password is incorrect';
                }
            } else {
                echo "name is incorrect";
            } 
            break;  
        }
    }
}
?>
<?php require_once("../helper/foot.php") ?>
