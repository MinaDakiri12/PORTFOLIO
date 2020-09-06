<?php


function display_testimonials(){
    global $pdo;
    try{
    $sql ="SELECT t.full_name, t.content, t.profile, t.role, m.file_location FROM testimonials t join media m on t.profile = m.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $testimonials){
        echo <<<testimonials
   <div class="testimonial__block">
                    <div class="inner-box">
                        <div class="testimonial__author">
                    
                            <div class="testimonial__image">
                                <img src="{$testimonials->file_location}" alt="{$testimonials->full_name}"/>
                            </div>
                        </div>
                        <div class="testimonial__text">{$testimonials->content}</div>
                        <div class="testimonial__name">{$testimonials->full_name}</div>
                        <div class="testimonial__designation">{$testimonials->role}</div>
                    </div>
                </div>



testimonials;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}
?>