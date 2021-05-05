<div class="dropdown">
    <a href="#" class="btn btn-default btn-sm dropdown-toggle " data-toggle="dropdown" id="navbarDropdownMenuLink2">
        <img src="<?php echo e(asset('images')); ?>/icons/flags/<?php echo e(strtoupper(config('app.locale'))); ?>.png" /> <?php echo e($currentLanguage); ?>

    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
        <?php $__currentLoopData = $availableLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a class="dropdown-item" href="?lang=<?php echo e($language->language); ?>">
                <img src="<?php echo e(asset('images')); ?>/icons/flags/<?php echo e(strtoupper($language->language)); ?>.png" /> <?php echo e($language->languageName); ?>

            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-new-language">
                <span class="btn-inner--icon"><i class="fa fa-language"></i> <?php echo e(__('Add new language')); ?></span>
            </a>
        </li>
        <?php if(config('app.locale')!=$defaultLanguage): ?>
            <li>
                <a href="?make_default_lang=<?php echo e(config('app.locale')); ?>" class="dropdown-item" >
                    <span class="btn-inner--icon"><i class="fa fa-check"></i> <?php echo e(__('Make')." ".$currentLanguage." ".__("default")); ?></span>
                </a>
            </li> 
        <?php endif; ?>
        <?php if(count($availableLanguages)>1): ?>
            <li>
                <a href="?remove_lang=<?php echo e(config('app.locale')); ?>" class="dropdown-item" >
                    <span class="btn-inner--icon"><i class="fa fa-trash"></i> <?php echo e(__('Remove')." ".$currentLanguage); ?></span>
                </a>
            </li> 
        <?php endif; ?>
        
    </ul>
</div><?php /**PATH /home/fastroch/public_html/resources/views/items/partials/languages.blade.php ENDPATH**/ ?>