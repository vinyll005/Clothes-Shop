<?php require_once(ROOT.'/views/layouts/header.php');?>
<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <?php if(isset($result)): ?>
                        <p style="color:green;">Register is done!</p>
                    <?php else: ?>
                    <h2 class="title">Registration</h2>
                    <form action="#" method="POST">

                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name" value="<?php if(isset($name)) echo $name;?>" required>
                            
                        </div>
                        <p style="color:red;"><?php if(isset($errors['name'])) echo $errors['name']; ?></p>

                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="E-mail" name="email" value="<?php if(isset($email)) echo $email;?>" required>
                        </div>
                        <p style="color:red;"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                        <p style="color:red;"><?php if(isset($errors['emailExists'])) echo $errors['emailExists']; ?></p>

                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="password" required>
                        </div>
                        <p style="color:red;"><?php if(isset($errors['password'])) echo $errors['password']; ?></p>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Register</button>
                        </div>
                        <p class = "p-t-20">Already register? <a href="/login">Log in</a> </p>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once(ROOT.'/views/layouts/footer.php');?>