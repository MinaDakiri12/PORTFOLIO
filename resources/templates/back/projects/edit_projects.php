<?php update_projects()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                    Update Projects
                    <div class="page-title-subheading">
                        By submitting this form you will update Projects  information
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_projects_sql = "SELECT * FROM projects WHERE id = ?";
        $projects_edit = $pdo->prepare($edit_projects_sql);
        $projects_edit->execute([$_GET['edit_projects']]);
        $projects_result = $projects_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($projects_result): ?>
                        <?php foreach($projects_result as $projects): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Title</label>
                                <input type="hidden" name="projects_id" value="<?php echo $projects->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="title projects" name="title" value="<?php echo $projects->title ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                           
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Github</label>
                                <input type="hidden" name="projects_id" value="<?php echo $projects->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="title projects" name="github" value="<?php echo $projects->github ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Link</label>
                                <input type="hidden" name="projects_id" value="<?php echo $projects->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="title projects" name="link" value="<?php echo $projects->link ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                           
                            <div class="col-md-6">
                                <label for="exampleFile" class="">File</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $projects->cover?>">
                                <input name="cover" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">Upload only if you want to replaced the existing image with a new one</small>
                            </div>
                        </div>
                        <input class="btn btn-primary" id="submit_event" type="submit" name="submit" value="Submit form">
                        
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php 
                        }  catch (PDOException $e) {
                            echo 'query failed' . $e->getMessage();
                        }
                    ?>
                    </form>
        
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            "use strict";
                            window.addEventListener(
                                "load",
                                function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName("needs-validation");
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (
                                        form
                                    ) {
                                        form.addEventListener(
                                            "submit",
                                            function (event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add("was-validated");
                                            },
                                            false
                                        );
                                    });
                                },
                                false
                            );
                        })();
                    </script>
                </div>