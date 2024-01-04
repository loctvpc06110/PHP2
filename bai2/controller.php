<?php
    include("model.php");

    //Controller
    $list_of_courses = get_courses();
    $semester = (!empty($_GET['semester'])) ? $_GET['semseter'] : '';
    $course_name = find_my_semester($semester);
    $page_content = $course_name;

    include('view.php');
?>