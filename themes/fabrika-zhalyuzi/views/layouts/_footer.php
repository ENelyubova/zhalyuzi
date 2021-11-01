<footer class="footer">
    <div class="content-site">
        <div class="footer-panel fl fl-jc-sb">
            <div class="footer-logo">
                <a href="/" class="logo fl fl-ai-c">
                    <img src="<?= $this->mainAssets . '/images/logo-white.svg' ?>" alt="Фабрика Жалюзи">
                </a>
                <div class="footer-nav hidden-mobile">
                    <ul>
                        <li>
                            <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
                        </li>
                        <li>
                            <a href="/sitemap">Карта сайта</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-menu">
                <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                <?php endif; ?>
            </div>
            
            <div class="footer-contacts footer-item">
                <div class="footer-contacts-item footer-contacts-phone">
                    <div class="phone">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
                        <?php endif; ?>
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone2']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="phone fl fl-w fl-ai-c">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone3']); ?>
                        <?php endif; ?>
                        <div class="messenger">
                        <?php if (Yii::app()->hasModule('contentblock')) : ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'messenger']); ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="footer-contacts-item footer-contacts-social">
                    <div class="social">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-contacts-item footer-contacts-address">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-nav visible-mobile">
                <ul>
                    <li>
                        <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
                    </li>
                    <li>
                        <a href="/sitemap">Карта сайта</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom fl fl-ai-c fl-jc-sb">
            <div class="footer-info"> 
               Являемся официальным партнером компании <a href="https://amigo.ru/">AMIGO</a>
            </div>
            <div class="dc56 dc56-white">
                <p>Создано в</p>
                <a href="https://dcmedia.ru/"></a>
            </div>
        </div>
    </div>
</footer>
