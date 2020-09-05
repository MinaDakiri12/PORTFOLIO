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
?>