<?php $__env->startSection('body'); ?>

    <div class="panel w-1/2">

        <div class="panel-header">

            <?php echo e(__('translation::translation.add_translation')); ?>


        </div>

        <form action="<?php echo e(route('languages.translations.store', $language)); ?>" method="POST">

            <fieldset>

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <div class="panel-body p-4">

                    <?php echo $__env->make('translation::forms.text', ['field' => 'group', 'label' => __('translation::translation.group_label'), 'placeholder' => __('translation::translation.group_placeholder')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <?php echo $__env->make('translation::forms.text', ['field' => 'key', 'label' => __('translation::translation.key_label'), 'placeholder' => __('translation::translation.key_placeholder')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('translation::forms.text', ['field' => 'value', 'label' => __('translation::translation.value_label'), 'placeholder' => __('translation::translation.value_placeholder')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <div class="input-group">

                        <button v-on:click="toggleAdvancedOptions" class="text-blue"><?php echo e(__('translation::translation.advanced_options')); ?></button>

                    </div>

                    <div v-show="showAdvancedOptions">

                        <?php echo $__env->make('translation::forms.text', ['field' => 'namespace', 'label' => __('translation::translation.namespace_label'), 'placeholder' => __('translation::translation.namespace_placeholder')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    </div>

  
                </div>

            </fieldset>

            <div class="panel-footer flex flex-row-reverse">

                <button class="button button-blue">
                    <?php echo e(__('translation::translation.save')); ?>

                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('translation::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/vendor/translation/languages/translations/create.blade.php ENDPATH**/ ?>