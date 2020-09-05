<?php

function display_projects(){
    global $pdo;
    try{
    $sql ="SELECT p.id, p.github,  p.cover, p.link, p.title, m.file_location FROM projects p join media m on p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $projects){

        echo <<<project
        <div class="projects__card" data-aos="flip-left" data-aos-duration="1200">
        <div class="projects__card--top">
            <img class="cover" src="uploads/{$projects->file_location} "alt="">
        </div>
        <div class="projects__card--lower">
                <a href=""><h1>{$projects->title}</h1></a>
            <h2>GitHub:</h2>
            <a class="projects__github" href="{$projects->github}">{$projects->github}</a>
            <a class="projects__link" href="{$projects->link}">website link</a>
        </div>
</div>

project;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' .$e->getMessage();
    }
}



function submit_projects(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $title = trim($_POST['title']);
        $github= trim($_POST['github']);
        $link = trim($_POST['link']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `projects` (`id`, `cover`,`title`,`github`, `link`) VALUES (NULL, ?, ?, ?,? )";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([  $cover_id, $title ,$github, $link]);
        if($result){
            set_message('success','Projects News created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}

function display_projects_admin()
{
    global $pdo;
    try{
        $sql = "SELECT p.*, m.file_name FROM projects p join media m on p.cover = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $projects){
        echo <<<projects
        <tr>
        <td class="text-center text-muted">{$projects->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$projects->file_name}" class="br-a" alt="projects thumbnail"></td>
        <td class=""> {$projects->title} </td>
        <td class=""> {$projects->github} </td>
        <td class=""> {$projects->link} </td>

        <td class="text-center">
            <a href="index.php?edit_projects={$projects->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_projects&delete_projects={$projects->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
projects;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}

function delete_projects()
{
    global $pdo;
    if (isset($_GET['delete_projects'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM projects p join media m on p.cover = m.id WHERE p.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the team's image data.
                $stmtimg->execute([$_GET['delete_projects']]);
                //fetch the team  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the Projects
                    $sql = "DELETE p, m FROM projects p join media m on p.cover = m.id WHERE p.id = ?";
                } else {
                    //this is the default image, The query to delete just the Projects
                    $sql = "DELETE FROM team WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The Projects
                $stmt->execute([$_GET['delete_projects']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Projects deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}
?>
