<?php
    echo "主题一啊\n";
    $json = array();
    $json['Id'] = 1;
    $json['Title'] = "测试名称";
    echo("来个JSON看看".json_encode($json));
    