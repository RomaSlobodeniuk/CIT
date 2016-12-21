<h1><?php echo $data->title; ?></h1>
<h2><?php echo 'Our id: ' . $data->id; ?></h2>
<h3><?php echo $data->description; ?></h3>

<div><?php
    if(!empty($data->params)) {
        echo $data->params;
    } ?></div>
<?php echo "Hello my dear friend! You've done it! CONGRATULATIONS !!!";?>