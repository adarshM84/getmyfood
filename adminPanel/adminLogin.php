<?php
require_once 'head.php';
?>
    <script src="js/coustom.js?v=<?php echo rand(); ?>"></script>
<div class="modal modal-signin position-static d-block bg-secondary py-5" style='height: 100vh;' tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="text-center">
                <img src="../images/lock.png" style="width: 25%;margin-top:35px;" alt="">
            </div>
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h2 class="fw-bold mb-0 text-center">Login</h2> -->
            </div>

            <div class="modal-body p-5 pt-0">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-4" id="emailId" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-4" id="pass" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="row">
                    <div class="col-mb-12">
                        <p class="error text-danger" id="error">

                        </p>
                        <p class="success text-success" id="success">

                        </p>
                    </div>
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="checkLogin()" type="submit">Sign up</button>
                <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                <audio id="audio" src="../music/loginMusic.mp3" hidden></audio>
                
                <hr class="my-4">
            </div>
        </div>
    </div>
</div>