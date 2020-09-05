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


?>
