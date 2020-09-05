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
?>
