<?php
$this->title = 'Тест | '.json_decode($quiz_data)->name;
$this->registerCssFile('/css/harry-potter.css', ['depends' => ['app\assets\AppAsset']]);
$questions = json_decode($questions);
$data = (array)json_decode($quiz_data);
var_dump($data);
?>
<div class="container" id="app">

</div>


<script>

</script>