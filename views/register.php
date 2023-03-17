<h1>Create an account <?php echo $registerModel->firstName ?></h1>

<?php $form = \app\core\form\Form::begin() ?>

    <div class="row">
        <div class="col"><?php echo $form->field($registerModel, "firstName") ?></div>
        <div class="col"><?php echo $form->field($registerModel, "lastName") ?></div>
    </div>
    <?php echo $form->field($registerModel, "email") ?>
    <?php echo $form->field($registerModel, "password") ?>
    <?php echo $form->field($registerModel, "passwordConfirmation") ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php $form = \app\core\form\Form::end() ?>
