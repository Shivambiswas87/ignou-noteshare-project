<?php
$flash = new \Plasticbrain\FlashMessages\FlashMessages();
$serviceUser = \services\User::getInstance();

if(isset($_POST['signup'])){
    $serviceUser->signup();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo \utils\Url::getAssetUrl('css/style.css');?>">
    <title>Sign up!</title>
</head>
<body>

<section class="gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center ">
      <div class="col-12 col-xl-8">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5  ">

            <div class="row">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 col-6 ">Registration Form</h3>
            <h3 class=" col-6 text-end fs-5 fw-light text-decoration-underline ">IGNOU</h3>
            </div>

            <?php $flash->display();?>


            <form method="post">

                <input type="hidden" name="signup" value="signup" />

              <div class="row">
                <!-- First Name & Last Name -->
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstname" class="form-control form-control-lg"
                           value="<?php echo isset($_POST['firstname']) ? $_POST['firstname']:'';?>" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastname" class="form-control form-control-lg"
                           value="<?php echo isset($_POST['lastname']) ? $_POST['lastname']:'';?>" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <!-- Create username -->
                  <div class="form-outline w-100">
                    <label for="birthdayDate" class="form-label">Create Username</label>
                    <input
                            type="text"
                            class="form-control form-control-lg"
                            id="birthdayDate"
                            name="username"
                            value="<?php echo isset($_POST['username']) ? $_POST['username']:'';?>"

                    />
                  </div>

                </div>

                <!-- Gender Select -->
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            id="femaleGender"
                            value="Female"
                            <?php echo (isset($_POST['gender']) && ($_POST['gender'] == 'Female') ) ? 'checked="checked"':'';?>
                    />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>
                    <div class="form-check form-check-inline">
                        <input
                                class="form-check-input"
                                type="radio"
                                id="maleGender"
                                name="gender"
                                value="Male"
                            <?php echo (isset($_POST['gender']) && ($_POST['gender'] == 'Male') ) ? 'checked="checked"':'';?>
                        />
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                                class="form-check-input"
                                type="radio"
                                id="OtherGender"
                                name="gender"
                                value="Other"
                            <?php echo (isset($_POST['gender']) && ($_POST['gender'] == 'Other') ) ? 'checked="checked"':'';?>
                        />
                        <label class="form-check-label" for="OtherGender">Other</label>
                    </div>



                </div>
              </div>

              <!-- Email -->
              <div class="row">
                <div class="col-12 mb-4 pb-2">

                  <div class="form-outline ">
                    <label class="form-label" for="emailAddress">Email</label>
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg"
                           value="<?php echo isset($_POST['email']) ? $_POST['email']:'';?>"
                    />
                  </div>

                </div>

                <!-- Password -->
                <div class="col-12 mb-4 pb-2">

                  <label for="inputPassword5" class="form-label"> Password</label>
                  <input type="password" id="inputPassword5" name="password" class="form-control" aria-describedby="passwordHelpBlock"
                   value="<?php echo isset($_POST['password']) ? $_POST['password']:'';?>" />
                  <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                  </div>
                </div>
              </div>


              <!-- Confirm Password -->
              <div class="row">
                <div class="col-12 mb-4 pb-2">

                  <label for="inputPassword5" class="form-label">Confirm Password</label>
                   <input type="password" name="repassword" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"
                          value="<?php echo isset($_POST['repassword']) ? $_POST['repassword']:'';?>"
                   />

                </div>

              </div>

              <!-- Student Or Teacher -->
              <div class="row">
                <label class="form-label select-label">I am a</label>
                <div class="col-12 mb-4 pb-2">
                  <select class="select form-control" name="role">
                    <option value="0" disabled>Choose option</option>
                    <option value="student" <?php echo (isset($_POST['role']) && ($_POST['role'] == 'student') ) ? 'checked="checked"':'';?>>Student</option>
                    <option value="teacher"<?php echo (isset($_POST['role']) && ($_POST['role'] == 'teacher') ) ? 'checked="checked"':'';?>>Teacher</option>
                  </select>

                </div>
              </div>

              <div class="mt-2 pt-1">
                <button type="submit" class="btn btn-lg my-primary-btn"> Sign up</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>