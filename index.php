<?php
include("classes/common.class.php");
$show = new Connection();
$results = $show->showAll();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- custom CSS -->
    <style>
        td {
            vertical-align: middle;
        }
        img {
            object-fit: cover;
            object-position: center;
        }
    </style>
    <title>Add Employees</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand text-muted" href="#">Employee's List</a>
            </div>
        </nav>
    </header>
    <section class="container-fluid pt-2 row">
        <aside class="my-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" id="add-emp" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle me-1"></i>
                Add Employee
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form action="">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="image" id="image">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                        <div id="username_err" class="form-text text-danger"><?= @$add->result["username_err"]; ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                        <div id="email_err" class="form-text text-danger"><?= @$add->result["email_err"]; ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                        <div id="name_err" class="form-text text-danger"><?= @$add->result["name_err"]; ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" name="age">
                                        <div id="age_err" class="form-text text-danger"><?= @$add->result["age_err"]; ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city">
                                        <div id="city_err" class="form-text text-danger"><?= @$add->result["city_err"]; ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="img" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="img" name="img" accept="image/jpeg">
                                        <div id="img_err" class="form-text text-danger"><?= @$add->result["image_err"]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add-btn" class="btn btn-success">Add Employee Details</button>
                                <button type="submit" class="btn btn-warning" id="edit-btn" type="submit">Edit Employee Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </aside>
        <aside class="col-md col-sm-12">
            <!-- Table  -->
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Sr no.</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sr = 1;
                    if (sizeof($results) > 0) {
                        foreach ($results as $result) {
                    ?>
                            <tr>
                                <td><?= $sr; ?></td>
                                <td><img class="rounded" src="<?= "uploads/" . $result["image"]; ?>" height="100px" width="100px" alt=""></td>
                                <td><?= $result["username"]; ?></td>
                                <td><?= $result["email"]; ?></td>
                                <td><?= $result["name"]; ?></td>
                                <td><?= $result["age"]; ?></td>
                                <td><?= $result["city"]; ?></td>
                                <td class="text-center">
                                    <buttton type="button" class="btn btn-warning edit-btn" data-bs-toggle="modal" data-id="<?= $result["id"]; ?>" data-bs-target="#exampleModal"><i class="bi bi-pencil me-1"></i>Edit</buttton>
                                    <button type="button" class="btn btn-danger del-btn" data-id="<?= $result["id"]; ?>"><i class="bi bi-trash me-1"></i>Delete</button>
                                </td>
                            </tr>
                        <?php
                            $sr++;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">No recorded founded.</td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
        </aside>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Ajax Call -->
    <script>
        $(() => {
            // ajax for adding employee details 
            $(document).on("submit", "#add", function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "includes/add.inc.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        if (data["validation"] === false) {
                            $("#username_err").text(data["username_err"]);
                            $("#email_err").text(data["email_err"]);
                            $("#name_err").text(data["name_err"]);
                            $("#age_err").text(data["age_err"]);
                            $("#city_err").text(data["city_err"]);
                            $("#img_err").text(data["image_err"]);
                        } else {
                            alert("Employee added successfully");
                            window.location.reload();
                        }
                        console.log(data);
                    }
                });
            });

            // ajax for updating employee details 
            $(document).on("submit", "#edit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "includes/update.inc.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data["validation"] === false) {
                            $("#username_err").text(data["username_err"]);
                            $("#email_err").text(data["email_err"]);
                            $("#name_err").text(data["name_err"]);
                            $("#age_err").text(data["age_err"]);
                            $("#city_err").text(data["city_err"]);
                            $("#img_err").text(data["image_err"]);
                        } else {
                            alert("Employee Updated successfully");
                            window.location.reload();
                        }
                    }
                });
            });

            // changing properties of modal 
            $("#add-emp").click(function() {
                $("form").attr("id", "add");
                $("#add-btn").show();
                $("#edit-btn").hide();
                $("#username").removeAttr("readonly")
                $("#email").removeAttr("readonly");
                $("#id").val("");
                $("#username").val("");
                $("#email").val("");
                $("#name").val("");
                $("#age").val("");
                $("#city").val("");
                $("#image").val("");
            });

            // changing properties of modal
            $(".edit-btn").click(function() {
                $("form").attr("id", "edit");
                $("#edit-btn").show();
                $("#add-btn").hide();
                $("#username").attr("readonly", "readonly");
                $("#email").attr("readonly", "readonly");
                let id = $(this).data("id");
                $.ajax({
                    url: "includes/get.inc.php",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#id").val(data.id);
                        $("#username").val(data.username);
                        $("#email").val(data.email);
                        $("#name").val(data.name);
                        $("#age").val(data.age);
                        $("#city").val(data.city);
                        $("#image").val(data.image);
                    }
                });
            });

            // deleting employee details 
            $(".del-btn").click(function() {
                let id = $(this).data("id");
                $.ajax({
                    url: "includes/delete.inc.php",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

</body>

</html>