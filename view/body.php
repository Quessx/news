
<div class="main">

    <div class="left-bar">
        <div class="placeholder">

        </div>
    </div>

    <div class="right-bar">
        <div class="placeholder">

        </div>
    </div>

    <div class="feed__item">
        <div class="content__info">

        </div>
        <div class="content">
            <div class="content-container">
                <div class="content-title">
                    <?= $view->arrRes['title']; ?>
                </div>
                <div class="content-text">
                    <?= $view->arrRes['paragraph']; ?>
                </div>

                <?php if (!empty($view->name)) { ?>

                <section>
                    <div class="content-image">
                        <img src="view/img/<?= $view->name; ?>.jpg" alt="">
                    </div>
                </section>

                <?php }?>
            </div>
        </div>
    </div>
</div>