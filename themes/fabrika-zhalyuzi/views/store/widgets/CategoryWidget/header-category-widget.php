<?php  ?>

<div class="menu-catalogSection-fix fl fl-w" id="menu-catalog">
	<div class="menu-catalogSection-fix__parent">
		<ul class="menu-catalogParent">
		    <?php foreach ($tree as $key => $data) : ?>
		    	<li class="menu-catalogParent__item js-menu-li <?= (!empty($data['items'])) ? 'has-submenu' : ''; ?>" data-id="#menu-catalogChild-<?= $data['id']; ?>">
		    		<a href="<?= $data['url']; ?>"><?= $data['label'] ?></a>
		    	</li>
		    <?php endforeach; ?>
	    </ul>
	</div>
	<div class="menu-catalogSection-fix__child">
		<?php foreach ($tree as $key => $data) : ?>
			<?php if (!empty($data['items'])) : ?>
				<div class="menu-catalogChild js-menu-catalogChild hidden" id="menu-catalogChild-<?= $data['id']; ?>">
					<div class="menu-catalogChild__header">
						<h2><?= $data['label'] ?></h2>
					</div>
					<?php /*<div class="menu-catalogChild__body">*/ ?>
						<?= StoreCategory::model()->renMenu($data['items']); ?>
					<?php /*</div>*/ ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<?php //$this->widget('zii.widgets.CMenu', ['items' => $tree, 'htmlOptions' => $htmlOptions]);
