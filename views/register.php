<h1>Create an account <?php echo $registerModel->firstName ?></h1>

<?php $form = \app\core\form\Form::begin() ?>

    <div class="row">
        <div class="col"><?php echo $form->field($registerModel, "firstName") ?></div>
        <div class="col"><?php echo $form->field($registerModel, "lastName") ?></div>
    </div>
    <?php echo $form->field($registerModel, "email")->emailField() ?>
    <?php echo $form->field($registerModel, "password")->passwordField() ?>
    <?php echo $form->field($registerModel, "passwordConfirmation")->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php $form = \app\core\form\Form::end() ?>
