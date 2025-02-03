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
                    <h4>Edit Student Assistants
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



                                <form class="row g-3" action="code.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input name="last_name" value="<?= $user['last_name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input name="first_name" value="<?= $user['first_name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Age</label>
                                        <input name="age" value="<?= $user['age']; ?>" type="number" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select name="sex" id="sex" class="form-select">
                                            <option value="Male" <?= ($user['sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?= ($user['sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cs" class="form-label">Civil Status</label>
                                        <select name="civil_status" id="cs" class="form-select">
                                            <option value="Single" <?= ($user['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                            <option value="Divorced" <?= ($user['civil_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                                            <option value="Married" <?= ($user['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                            <option value="Widowed" <?= ($user['civil_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input name="date_of_birth" value="<?= $user['date_of_birth']; ?>" class="form-control" id="dob">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">City Address</label>
                                        <input name="city_address" value="<?= $user['city_address']; ?>" class="form-control" id="ct">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact No.</label>
                                        <input name="contact_no1" value="<?= $user['contact_no1']; ?>" class="form-control" id="cn1">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Provincial Address</label>
                                        <input name="province_address" value="<?= $user['province_address']; ?>" class="form-control" id="prov">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact No.</label>
                                        <input name="contact_no2" value="<?= $user['contact_no2']; ?>" class="form-control" id="cn2">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Guardian/s</label>
                                        <input name="guardian" value="<?= $user['guardian']; ?>" class="form-control" id="gar">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact No.</label>
                                        <input name="contact_no3" value="<?= $user['contact_no3']; ?>" class="form-control" id="cn3">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Honors/Awards</label>
                                        <input name="honor_award" value="<?= $user['honor_award']; ?>" class="form-control" id="hon">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Past Scholarships</label>
                                        <input name="past_scholar" value="<?= $user['past_scholar']; ?>" class="form-control" id="scho">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">I intend to enroll/continue in the Program</label>
                                        <input name="program" value="<?= $user['program']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Year</label>
                                        <input name="year" value="<?= $user['year']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Scholarships enjoyed at the present</label>
                                        <input name="present_scholar" value="<?= $user['present_scholar']; ?>" class="form-control" id="scho1">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Work Experience (Describe briefly)</label>
                                        <input name="work_experience" value="<?= $user['work_experience']; ?>" class="form-control" id="dis">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Special Talents</label>
                                        <input name="special_talent" value="<?= $user['special_talent']; ?>" class="form-control" id="tal">
                                    </div>


                                    <hr class="divider" />
                                    <h6>I would like to work in: check 2 boxes of your priority choice:</h6>

                                    <?php
                                    $query = "SELECT * FROM work";
                                    $query_run = mysqli_query($con, $query);

                                    $offices = [];
                                    $laboratories = [];
                                    $manpower_services = [];

                                    $work = $user['work'];
                                    $works = explode(',', $work);
                                    $works = array_map('trim', $works);


                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            switch ($row['type']) {
                                                case 'Office':
                                                    $offices[] = $row['work_name'];
                                                    break;
                                                case 'Laboratory':
                                                    $laboratories[] = $row['work_name'];
                                                    break;
                                                case 'Manpower Services':
                                                    $manpower_services[] = $row['work_name'];
                                                    break;
                                            }
                                        }
                                    }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="offices" class="form-label"><strong>Offices</strong></label>
                                            <?php foreach ($offices as $office): ?>
                                                <div>
                                                    <input type="checkbox" name="work_in[]" value="<?php echo htmlspecialchars($office); ?>"
                                                        <?php echo in_array(trim($office), $works) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($office); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="laboratories" class="form-label"><strong>Laboratories</strong></label>
                                            <?php foreach ($laboratories as $laboratory): ?>
                                                <div>
                                                    <input type="checkbox" name="work_in[]" value="<?php echo htmlspecialchars($laboratory); ?>"
                                                        <?php echo in_array(trim($laboratory), $works) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($laboratory); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="manpower_services" class="form-label"><strong>Manpower Services</strong></label>
                                            <?php foreach ($manpower_services as $service): ?>
                                                <div>
                                                    <input type="checkbox" name="work_in[]" value="<?php echo htmlspecialchars($service); ?>"
                                                        <?php echo in_array(trim($service), $works) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($service); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>


                                    <hr class="divider" />

                                    <h4>Reference</h4>

                                    <center>
                                        <h4>Outside WIT</h4>
                                    </center>

                                    <div class="col-md-4">
                                        <label class="form-label">Name</label>
                                        <input name="out_name1" value="<?= $user['out_name1']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Company/Address</label>
                                        <input name="comp_add1" value="<?= $user['comp_add1']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact No.</label>
                                        <input name="cn1" value="<?= $user['cn1']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="out_name2" value="<?= $user['out_name2']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="comp_add2" value="<?= $user['comp_add2']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="cn2" value="<?= $user['cn2']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="out_name3" value="<?= $user['out_name3']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="comp_add3" value="<?= $user['comp_add3']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="cn3" value="<?= $user['cn3']; ?>" class="form-control">
                                    </div>

                                    <hr class="divider" />

                                    <center>
                                        <h4>From WIT</h4>
                                    </center>

                                    <div class="col-md-4">
                                        <label class="form-label">Name</label>
                                        <input name="from_wit1" value="<?= $user['from_wit1']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Company/Address</label>
                                        <input name="comp_add4" value="<?= $user['comp_add4']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact No.</label>
                                        <input name="cn4" value="<?= $user['cn4']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="from_wit2" value="<?= $user['from_wit2']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="comp_add5" value="<?= $user['comp_add5']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="cn5" value="<?= $user['cn5']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="from_wit3" value="<?= $user['from_wit3']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="comp_add6" value="<?= $user['comp_add6']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="cn6" value="<?= $user['cn6']; ?>" class="form-control">
                                    </div>

                                    <hr class="divider" />

                                    <center>
                                        <h4>Family Information</h4>
                                    </center>

                                    <div class="col-md-4">
                                        <label class="form-label">Father's Name</label>
                                        <input name="fathers_name" value="<?= $user['fathers_name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Occupation</label>
                                        <input name="fathers_occ" value="<?= $user['fathers_occ']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Approx. Income/Mon</label>
                                        <input name="fathers_income" value="<?= $user['fathers_income']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Mother's Name</label>
                                        <input name="mothers_name" value="<?= $user['mothers_name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Occupation</label>
                                        <input name="mothers_occ" value="<?= $user['mothers_occ']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Approx. Income/Mon</label>
                                        <input name="mothers_income" value="<?= $user['mothers_income']; ?>" class="form-control">
                                    </div>
                                    <!-- <div class="col-md-8">
                                        <label class="form-label">Other Source of Income</label>
                                        <input name="other_income" value="<?= $user['other_income']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Approx. Income/Mon</label>
                                        <input name="approx_income" value="<?= $user['approx_income']; ?>" class="form-control">
                                    </div> -->
                                    <center>
                                        <h5>Brothers & Sister</h5>
                                    </center>

                                    <div class="col-md-3">
                                        <label class="form-label">Name</label>
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Age</label>
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Course/Yr./Grad./Sch</label>
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Work/Studying/No Work</label>
                                        <input name="bs_status" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="bs_status" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="bs_status" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="bs_status" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="bs_status" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="bs_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input name="bs_age" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="bs_lvl" class="form-control" id="age">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="bs_status" class="form-control">
                                    </div>





                                    <div class="col-12">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update</button>
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