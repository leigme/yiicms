<div class="container">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'link-form',
        'enableAjaxValidation'=>false,
        /**
         * activeFileField()方法为一个模型属性生成一个文件输入框。
         * 注意，你必须设置表单的‘enctype’属性为‘multipart/form-data’。
         * 表单被提交后，上传的文件信息可以通过$_FILES[$name]来获得 (请参阅 PHP documentation).
         * htmlOptions的class属性设置表单的样式
         */
        'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'form-signin',),
        'action'=>$this->ycGetPath('default/admin/index'),
    )); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <!-- $model 对应模型对象 -->
    <?php echo $form->textField($model,'Username', array('class'=>'form-control', 'placeholder'=>'Email address')); ?> 
    <label for="inputPassword" class="sr-only">Password</label>
    <!-- $model 对应模型对象 -->
    <?php echo $form->textField($model,'Password', array('class'=>'form-control', 'placeholder'=>'Password')); ?>
    <div class="checkbox">
        <label>
        	<!-- $model 单个复选框 -->
        	<?php echo $form->checkBox($model, 'OperateFlag'); ?>
        	 Remember me
        </label>
    </div>
    <!-- CHtml::submitButton 提交from表单方法 -->
    <?php echo CHtml::submitButton('Sign in', array('class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php $this->endWidget(); ?>

</div> <!-- /container -->