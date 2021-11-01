 <header class="header <?= ($this->action->id=='index' && $this->id=='hp') ? 'header-home' : 'header-page'; ?>">
  <div class="content-site">
    <div class="header-content fl fl-ai-c fl-jc-sb">
      <div class="header__item fl fl-ai-c">
        <div class="header-logo">
          <a href="/" class="logo logo-header fl fl-ai-c fl-jc-c">
            <img src="<?= $this->mainAssets . '/images/logo.svg' ?>" alt="Фабрика Жалюзи">
          </a>
        </div><!-- logo --> 
        
        <!-- <div class="header-menu"> -->
          <div class="header-menu menu">
            <?php if (Yii::app()->hasModule('menu')) : ?>
              <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
            <?php endif; ?>
          </div>
        <!-- </div> -->
      </div>

      <div class="header__item fl fl-ai-c fl-jc-e">
        <div class="phone header-phone">
          <?php if (Yii::app()->hasModule('contentblock')): ?>
            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
          <?php endif; ?>
          <?php if (Yii::app()->hasModule('contentblock')): ?>
            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone2']); ?>
          <?php endif; ?>
        </div>
        <div class="header-callback callback fl fl-ai-c">
          <a href="#" class="btn btn-black" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
          <a href="#" class="btn btn-white" data-toggle="modal" data-target="#orderFreeModal" tabindex="0">Бесплатный замер</a>
        </div>
      </div>
      
      <div class="mobile-panel">
        <button class="m-menu-button m-menu-open fl fl-ai-c fl-jc-c">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </button>
      </div><!-- mobile-panel -->
      <div class="mobile-menu">
        <div class="content-site">
          <div class="mobile-content">
            <?php if (Yii::app()->hasModule('menu')) : ?>
              <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
            <?php endif; ?>
            <hr>
            <div class="mobile-content__item phone">
              <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
              <?php endif; ?>
              <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone2']); ?>
              <?php endif; ?>
            </div>
            <div class="mobile-content__item fl fl-ai-c">
              <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone3']); ?>
              <?php endif; ?>
              <div class="messenger">
                <?php if (Yii::app()->hasModule('contentblock')) : ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'messenger']); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="mobile-content__item social">
              <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</header>
