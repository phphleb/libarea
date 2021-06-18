<?php include TEMPLATE_DIR . '/header.php'; ?>
<div class="wrap">
    <main>
        <div class="flow">
            <div id="content"></div>
            <?php include TEMPLATE_DIR . '/flow/flow-form.php'; ?>
        </div>
    </main>
    <aside>
        <h1><?= $data['h1']; ?></h1>
        <?= lang('info_flow'); ?>
    </aside>
</div>
<script async src="/assets/js/common.js"></script>
<?= getRequestResources()->getBottomStyles(); ?>
<?= getRequestResources()->getBottomScripts(); ?> 
</body>
</html> 