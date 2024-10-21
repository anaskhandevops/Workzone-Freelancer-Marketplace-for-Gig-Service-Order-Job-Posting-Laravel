<?php

function admin_lang(){
    return 'en';
}

function front_lang(){
    return Session::get('front_lang');
}


function html_decode($text){
    $decode_text = htmlspecialchars_decode($text, ENT_QUOTES);
    return $decode_text;
}


function currency($amount){

    // currency information will be loaded from session value

    $currency_icon = Session::get('currency_icon');
    $currency_code = Session::get('currency_code');
    $currency_rate = Session::get('currency_rate');
    $currency_position = Session::get('currency_position');

    $amount = $amount * $currency_rate;
    $amount = number_format($amount, 2, '.', ',');

    if($currency_position == 'before_price'){
        $amount = $currency_icon. $amount;
    }elseif($currency_position == 'before_price_with_space'){
        $amount = $currency_icon.' '. $amount;
    }elseif($currency_position == 'after_price'){
        $amount = $amount.$currency_icon;
    }elseif($currency_position == 'after_price_with_space'){
        $amount = $amount.' '.$currency_icon;
    }else{
        $amount = $currency_icon. $amount;
    }

    return $amount;
}





function getAllResourceFiles($dir, &$results = array()) {
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = $dir ."/". $value;
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getAllResourceFiles($path, $results);
        }
    }
    return $results;
}

function getRegexBetween($content) {

    preg_match_all("%\{{ __\(['|\"](.*?)['\"]\) }}%i", $content, $matches1, PREG_PATTERN_ORDER);
    preg_match_all("%\@lang\(['|\"](.*?)['\"]\)%i", $content, $matches2, PREG_PATTERN_ORDER);
    preg_match_all("%trans\(['|\"](.*?)['\"]\)%i", $content, $matches3, PREG_PATTERN_ORDER);
    $Alldata = [$matches1[1], $matches2[1], $matches3[1]];
    $data = [];
    foreach ($Alldata as  $value) {
        if(!empty($value)){
            foreach ($value as $val) {
                $data[$val] = $val;
            }
        }
    }
    return $data;
}

function generateLang($path = ''){

    // user panel
    $paths = getAllResourceFiles(resource_path('views'));

    $paths = array_merge($paths, getAllResourceFiles(app_path()));

    $paths = array_merge($paths, getAllResourceFiles(base_path('Modules')));

    // end user panel

    $AllData= [];
    foreach ($paths as $key => $path) {
    $AllData[] = getRegexBetween(file_get_contents($path));
    }
    $modifiedData = [];
    foreach ($AllData as  $value) {
        if(!empty($value)){
            foreach ($value as $val) {
                $modifiedData[$val] = $val;
            }
        }
    }

    $modifiedData = var_export($modifiedData, true);

    file_put_contents('lang/en/translate.php', "<?php\n return {$modifiedData};\n ?>");

}


function checkModule($module_name){
    $json_module_data = file_get_contents(base_path('modules_statuses.json'));
    $module_status = json_decode($json_module_data);

    if(isset($module_status->$module_name) && $module_status->$module_name && File::exists(base_path('Modules').'/'.$module_name)){
        return true;
    }

    return false;

}
