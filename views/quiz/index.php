<?php
$data = $data;
var_dump($data);
foreach ($data as $theme) {?>
    <a href="/quiz/theme/<?=$theme['style_name']?>"><?= $theme['show_name']?></a>
<?}?>