<?php
    require_once("./vendor/autoload.php");

    // Bài 1
    // use App\Core\Field;

    // $field = new Field("Họ");
    // echo $field;

    // Bài 2
    // use App\Core\Form;

    // $form = Form::begin('/submit', 'post');
    // $field = $form->Field('firstname');
    // echo $field;
    // echo Form::end();

?>
<!-- Bài 3 -->
<?php use App\Core\Form; ?>

<div class="container">
    <h1>Create An Account</h1>
    <?php $form = Form::begin('','Post'); ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field('FrirstName'); ?>
        </div>
        <div class="col">
            <?php echo $form->field('LastName'); ?>
        </div>
    </div>
    <?php echo $form->field('email'); ?>
    <?php echo $form->field('password')->passwordField(); ?>
    <?php echo $form->field('comfirmPassword')->passwordField(); ?>
   <button type="submit">Submit</button> 
   <?php echo Form::end();?>
</div>