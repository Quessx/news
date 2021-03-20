
<div class="main">

    <div class="left-bar">
        <div class="placeholder">

        </div>
    </div>

    <div class="right-bar">
        <div class="placeholder">

        </div>
    </div>
    <?php foreach ($model->selectData() as $item) { ?>

    <div class="feed__item">
        <div class="content__info">

        </div>
        <div class="content">
            <div class="content-container">
                <div class="content-title">
                    <?= $item['title']; ?>
                </div>
                <div class="content-text">
                    <?= $item['paragraph']; ?>
                </div>

                <?php if (!empty($getContents->name)) { ?>

                <section>
                    <div class="content-image">
                        <img src="view/img/<?= $getContents->name; ?>.jpg" alt="">
                    </div>
                </section>

                <?php } ?>

                <?php if(!empty($item['video'])){ ?>
                <section>
                    <div class="content-video">
                        <video controls style="width: 100%; outline: none;">
                            <source src="<?= $item['video']; ?>" type="video/mp4">
                        </video>
                    </div>
                </section>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

</div>