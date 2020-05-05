<?php

$this->registerCssFile('/css/'.$style_name.'.css', ['depends' => ['app\assets\AppAsset']]);
?>
<?foreach ($data as $item) {?>
    <a href="/quiz/test/<?=$item['id']?>"><?= $item['name']?></a>
<?}?>

