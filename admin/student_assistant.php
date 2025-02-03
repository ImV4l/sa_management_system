<?php
include('authentication.php');
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4"></ol>
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Student Assistant Personal Information
                        <a href="view-register.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM student_assistant WHERE id='$user_id'";
                        $users_run = mysqli_query($con, $users);

                        if (mysqli_num_rows($users_run) > 0) {
                            foreach ($users_run as $user) {
                    ?>
                                <form class="row g-3" action="addcode.php" method="POST">
                                    <!-- Main Container -->
                                    <div class="container mt-5">
                                        <div class="row">
                                            <!-- Left Container -->
                                            <div class="col-md-6">
                                                <div class="p-3  text-black">


                                                    <div class="row">
                                                        <!-- Profile Image -->
                                                        <div class="col-md-4 text-center">
                                                            <img src="https://lh3.googleusercontent.com/a/ACg8ocJh2Db4p91fIufnjaho8W6XlCWUG2juZh_W-p4auA_vza_ZP-hs=s96-c" class="img-fluid rounded-circle" alt="Profile Photo" style="max-width: 100px;">
                                                        </div>
                                                        <!-- Personal Info -->
                                                        <div class="col-md-8">
                                                            <h1 class="mb-1"><?= $user['last_name']; ?>, <?= $user['first_name']; ?></h1>
                                                            <p class="mb-5"><?= $user['work']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2">
                                                            <label for="age" class="form-label">Age</label>
                                                            <input type="number" name="age" value="<?= $user['age']; ?>" class="form-control" id="age">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="sex" class="form-label">Sex</label>
                                                            <select name="sex" id="sex" class="form-select">
                                                                <option value="Male" <?= ($user['sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                                <option value="Female" <?= ($user['sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="civil_status" class="form-label">Civil Status</label>
                                                            <select name="civil_status" id="cs" class="form-select">
                                                                <option value="Single" <?= ($user['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                                                <option value="Divorced" <?= ($user['civil_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                                                                <option value="Married" <?= ($user['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                                <option value="Widowed" <?= ($user['civil_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input name="date_of_birth" value="<?= $user['date_of_birth']; ?>" class="form-control" id="dob">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="city_address" class="form-label">City Address</label>
                                                            <input name="city_address" value="<?= $user['city_address']; ?>" class="form-control" id="ct">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="contact_no" class="form-label">Contact No.</label>
                                                            <input name="contact_no1" value="<?= $user['contact_no1']; ?>" class="form-control" id="cn1">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="provincial_address" class="form-label">Provincial Address</label>
                                                            <input name="province_address" value="<?= $user['province_address']; ?>" class="form-control" id="prov">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="guardian" class="form-label">Guardian/s</label>
                                                            <input name="guardian" value="<?= $user['guardian']; ?>" class="form-control" id="gar">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="present_scholarship" class="form-label">Scholarship enjoyed at the present</label>
                                                            <input name="present_scholar" value="<?= $user['present_scholar']; ?>" class="form-control" id="scho1">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="scholarship" class="form-label">Past Scholarship</label>
                                                            <input name="past_scholar" value="<?= $user['past_scholar']; ?>" class="form-control" id="scho">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="intent" class="form-label">I intend to enroll/continue this program</label>
                                                        <input name="program" value="<?= $user['program']; ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Year</label>
                                                        <input name="year" value="<?= $user['year']; ?>" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="honors" class="form-label">Honors/Awards</label>
                                                        <input name="honor_award" value="<?= $user['honor_award']; ?>" class="form-control" id="hon">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="work_experience" class="form-label">Work Experiences</label>
                                                        <input name="work_experience" value="<?= $user['work_experience']; ?>" class="form-control" id="dis">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="talents" class="form-label">Special Talents</label>
                                                        <input name="special_talent" value="<?= $user['special_talent']; ?>" class="form-control" id="tal">
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Right Container -->
                                            <div class="col-md-6">
                                                <div class="p-3  text-black">


                                                    <h4>References</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <label for="reference_name_outside" class="form-label">Outside WIT - Name</label>
                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="reference_name_outside" class="form-label">Company/Address</label>
                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="reference_contact_outside" class="form-label">Contact No.</label>
                                                            <input type="tel" name="reference_contact_outside" class="form-control" id="reference_contact_outside">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="tel" name="reference_contact_outside" class="form-control" id="reference_contact_outside">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_outside" class="form-control" id="reference_name_outside">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="tel" name="reference_contact_outside" class="form-control" id="reference_contact_outside">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <label for="reference_name_wit" class="form-label">From WIT - Name</label>
                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="reference_name_wit" class="form-label">Company/Address</label>
                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="reference_contact_wit" class="form-label">Contact No.</label>
                                                            <input type="tel" name="reference_contact_wit" class="form-control" id="reference_contact_wit">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="tel" name="reference_contact_wit" class="form-control" id="reference_contact_wit">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="text" name="reference_name_wit" class="form-control" id="reference_name_wit">
                                                        </div>
                                                        <div class="col-md-4">

                                                            <input type="tel" name="reference_contact_wit" class="form-control" id="reference_contact_wit">
                                                        </div>
                                                    </div>

                                                    <h4>Family Information</h4>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="fathers_name" class="form-label">Father's Name</label>
                                                            <input type="text" name="fathers_name" class="form-control" id="fathers_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fathers_name" class="form-label">Occupation</label>
                                                            <input type="text" name="fathers_name" class="form-control" id="fathers_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fathers_income" class="form-label">Father's Approx. Income/Mon.</label>
                                                            <input type="number" name="fathers_income" class="form-control" id="fathers_income">
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="mothers_name" class="form-label">Mother's Name</label>
                                                            <input type="text" name="mothers_name" class="form-control" id="mothers_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mothers_name" class="form-label">Occupation</label>
                                                            <input type="text" name="mothers_name" class="form-control" id="mothers_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mothers_income" class="form-label">Mother's Approx. Income/Mon.</label>
                                                            <input type="number" name="mothers_income" class="form-control" id="mothers_income">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="siblings" class="form-label">Brothers & Sisters</label>
                                                        <textarea name="siblings" class="form-control" id="siblings" rows="3"></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
include('includes/scripts.php');
?>