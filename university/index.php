<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University</title>
    <?php include("../includes/head.php"); ?>
</head>
<body>
<?php
include("../includes/db.php");
$rows = $db->query("SELECT * FROM universities", PDO::FETCH_ASSOC);
?>
<div id="app">
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
            <div class="row mt-5">
                <div class="form-blok border border-dark">
                    <a class="btn w-25 btn-primary mt-4 mb-3 add" onclick="form_toggle()" role="button">Add
                        University</a>
                    <form method="get" action="add.php" class="pb-4 add_form">
                        <div class="form-group pt-2">
                            <label>University</label>
                            <input type="text" class="form-control" v-model="add_input" name="university"
                                   placeholder="enter university name ...">
                        </div>
                        <button :disabled="!(add_input.length>3)" type="submit" class="btn btn-primary mt-2 submit">Submit</button>
                    </form>
                    <?php
                    if($_GET){
                        $id = $_GET["id"];
                        $title = $_GET["title"];
                    }
                    ?>
                    <form method="get" action="edit.php" style="display: none" class="pb-4 edit_form">
                        <div class="form-group pt-2">
                            <label>University</label>
                            <input type="text" class="form-control add_input" value="<?php echo $title; ?>" name="university"
                                   placeholder="enter university name ...">
                            <label hidden>ID</label>
                            <input hidden type="text" class="form-control" value="<?php echo $id; ?>" name="id">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 save">Save</button>
                    </form>
                </div>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">University</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <th scope="row"><?php echo $row["id"] ?></th>
                            <td><?php echo $row["title"] ?></td>
                            <td><a class="btn btn-primary edit"
                                   href="http://localhost/university_project/university?id=<?php echo $row["id"] . "&" ."title=". $row["title"]; ?>"
                                    onclick="reloadP()">Edit</a>
                                <a class="btn btn-danger delete"
                                   href="http://localhost/university_project/university/delete.php?id=<?php echo $row["id"] ?>">Delete</a>
                                <a class="btn btn-danger cancel" href="index.php" style="display: none">Cancel</a>
                                <a class="btn btn-warning info" href="http://localhost/university_project/faculty/faculty.php?uniid=<?php echo $row["id"] . "&faculty=". $row["title"] . "&id=".$row["id"]; ?>">Info</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<?php include("../includes/footer.php") ?>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            add_input : "",
            edit_input : ""
        }
    })
</script>
</body>
</html>