<?php 
    /** @var $model \App\Models\UserModel */
?>

<style>

        

</style>

<!-- register form with username, password and confirm password using bulma -->
<div class="login-box">
    <div class="logo">
        Barangay Palico 4 Admin
    </div>
    <?php $form = App\Core\Form\Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'password')->passwordField() ?>
        <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

        <button type="submit" class="login-btn">Register</button>
    <?php App\Core\Form\Form::end() ?>
    <div class="signup-link">
        Already have an account? <a href="/login">Login</a>
    </div>
</div> 