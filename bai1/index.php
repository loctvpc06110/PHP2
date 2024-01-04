<?php
    $course = [
        "s1"=> "course1",
        "s2"=> "course2",
        "s3"=> "course3",
    ];

//model
function get_courses(){
    global $course;
    return array_values($course);
}

function find_my_semester($semester){
    global $course;
    return (array_key_exists($semester, $course)? $course[$semester] : 'Invalid course' );
}

//controller
$list_of_courses = get_courses();
$semester = (!empty($_GET['semester'])) ? $_GET['semseter'] : '';
$course_name = find_my_semester($semester);
$page_content = $course_name;
?>

<!-- View -->

<?= $page_content;?>
<br>
<select name="courses" id="">
    <?php foreach($list_of_courses as $course_name): ?>
        <option><?= $course_name?></option>
    <?php endforeach;?>
</select>