<div class="still-questions pt pb">
    <div class="content-site">
        <div class="still-questions__content fl fl-w">
            <div class="still-questions__title">
                <h2 class="heading heading-pb">У вас остались <br>вопросы?</h2>
                <p>Вызвать специалиста с образцами продукции, получить <br>консультацию, узнать стоимость и заказать жалюзи в Оренбурге <br>Вы можете по телефону 96-12-42 или оставив заявку на сайте.</p>
            </div>
            <div class="still-questions__contact">
                <div class="still-questions__contact_link">
                	<?php if (Yii::app()->hasModule('contentblock')): ?>
                	    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
                	<?php endif; ?>
                	
                	<?php if (Yii::app()->hasModule('contentblock')): ?>
                	    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                	<?php endif; ?>
                </div>
                <a href="#" class="btn btn-black" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
            </div>
        </div>
    </div>
</div>