<?php
    //Model
function get_courses(){
    include("data.php");
    return array_values($course);
}

function find_my_semester($semester){
    include("data.php");
    return (array_key_exists($semester, $course)? $course[$semester] : 'Invalid course' );
}

?>