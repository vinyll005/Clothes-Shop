<?php require_once(ROOT.'/views/layouts/header.php');?>
<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Log in</h2>
                    <form action="#" method="POST">

                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="E-mail" name="email" value="<?php if(isset($email)) echo $email;?>" required>
                        </div>
                        <p style="color:red;"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>

                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="password" required>
                        </div>
                        <p style="color:red;"><?php if(isset($errors['password'])) echo $errors['password']; ?></p>
                        <p style="color:red;"><?php if(isset($errors['userExists'])) echo $errors['userExists']; ?></p>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Log in</button>
                        </div>
                        <p class = "p-t-20">Still not register? <a href="/register">Register</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once(ROOT.'/views/layouts/footer.php');?>