<?php if (isset($mess) && $mess): ?>

<div class="alert alert-primary text-dark alert-dismissible" role="alert">
   	<p><strong><i class="fas fa-exclamation-circle pr-1"></i>Thông báo: </strong> <?php echo $mess ?></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
</div>

<?php endif; ?>