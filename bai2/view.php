<!-- view -->
<?=$page_content?>
<br>
<select name="courses" id="">
    <?php foreach($list_of_courses as $course_name): ?>
        <option><?= $course_name?></option>
    <?php endforeach;?>
</select>