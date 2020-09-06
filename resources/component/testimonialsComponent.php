<?php


function display_testimonials(){
    global $pdo;
    try{
    $sql ="SELECT t.full_name, t.content, t.profile, t.role, m.file_location FROM testimonials t join media m on t.profile =  m.id ORDER BY t.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $testimonials){
        echo <<<testimonials
   <div class="testimonial__block">
                    <div class="inner-box">
                        <div class="testimonial__author">
                    
                            <div class="testimonial__image">
                                <img src="uploads/{$testimonials->file_location}" alt="{$testimonials->full_name}"/>
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

// submit a testimonials to database admin area
function submit_testimonials(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['full_name']);
        $content = trim($_POST['content']);
        $role = trim($_POST['role']);
        $file = $_FILES['profile']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('profile', $cover_id);
        $sql = "INSERT INTO `testimonials` (`id`, `full_name`, `content`, `role`, `profile`) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $content, $role, $cover_id]);
        if($result){
            set_message('success','testimonials created successfully');
            
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