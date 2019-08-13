<?php
error_reporting( E_ALL );
require_once('libs/functions.php');
//require_once('libs/xml2array.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ethereum</title>
        <style type="text/css">
            table { border-collapse: collapse;}
            table td {border: 1px solid #695226; padding: 5px;}
            table td.header {font-weight: bold; text-align: center; background-color: #368EAC; color: #ffffff;}
            div {margin-bottom: 10px;}
        </style>
        
        
        <?php
        $json_url = "https://api.coinpaprika.com/v1/coins/eth-ethereum/markets";
        $json_data = file_get_contents($json_url);
        
        //
        $obj_data = json_decode($json_data, true);
        /* json_dedocde converts/decodes json format into multi-dimensioal array.
        *  
        * echo $obj_data[0]->base_currency_name;
        *
        * echo statement above will throw error like:
        * Notice: Trying to get property of non-object in C:\xampp\htdocs\snippets\coinpaprika\index.php on line 25
        */
        ?>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script type="text/javascript">
            
            //Copy PHP variable 'string' value to JS variable named js_json
            <?php  echo 'var js_json = '.$json_data.';'; ?>
          
            var this_currency = js_json[0].base_currency_id;
            var coins_size = js_json.length;       
            
        </script>
    
    </head>
    
   
    
    <body>
        
        <p><?php echo count($obj_data); ?></p>
        <p><?php echo $obj_data[0]["base_currency_name"]; ?></p>
        <p><?php print_value($json_data); ?></p>
        <p><?php print_value($obj_data); ?></p>
        
        
        
    </body>
       
    
</html>    


<script type="text/javascript">
    $(document).ready(function(){
          
        console.log(coins_size);
        console.log(js_json[0].base_currency_name);
        
        console.log(js_json);
    });
</script>