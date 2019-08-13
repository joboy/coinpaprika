<?php
error_reporting( E_ALL );
//require_once('libs/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ethereum - DOM Source</title>
       
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
        
        <?php
        $json_url = "https://api.coinpaprika.com/v1/coins/eth-ethereum/markets";
        $json_data = file_get_contents($json_url);
        
        //
        $array_data = json_decode($json_data, true);
        /* json_dedocde converts/decodes json format into multi-dimensioal array.
        *  
        * echo $obj_data[0]->base_currency_name;
        *
        * echo statement above will throw error like:
        * Notice: Trying to get property of non-object in C:\xampp\htdocs\snippets\coinpaprika\index.php on line 25
        */
        ?>
    
       
        <script type="text/javascript">
            /***** 
            * Copy PHP variable 'string' value to JS variable named js_json
            * Will work on this, format needs to be same on
            * https://datatables.net/examples/data_sources/js_array
            * Check data structure via console.log()
            */
            <?php  echo 'var js_json = '.$json_data.';'; ?>
        </script>
      
    
    </head>
    
   
    
    <body>
        <!-- Displays data structure of $array_data var. -->
        <p><?php echo count($array_data); ?></p>

        <table id="example" class="display">
            <thead>
                <tr>
                    
                    <th>Exchange Name</th>
                    <th>Pair</th>
                    <th>Base Currency ID</th>
                    <th>Base Currency Name</th>
                    <th>Quote Currency ID</th>
                    <th>Quote Currency Name</th>
                    <th>Market URL</th>
                    <th>Fee Type</th>
                    <th>Adjusted Volume 24H Share</th>
                    <th>Quotes</th>
                    <td>Last Updated</td>
                </tr>
            </thead>
            <tbody>
                   
                    <?php foreach( $array_data as $coins) : ?>
                    <tr>
                        
                        <td><?php echo $coins['exchange_name']; ?></td>
                        <td><?php echo $coins['pair']; ?></td>
                        <td><?php echo $coins['base_currency_id']; ?></td>
                        <td><?php echo $coins['base_currency_name']; ?></td>
                        <td><?php echo $coins['quote_currency_id']; ?></td>
                        <td><?php echo $coins['quote_currency_name']; ?></td>
                        <td><?php echo $coins['market_url']; ?></td>
                        <td><?php echo $coins['fee_type']; ?></td>
                        <td><?php echo $coins['adjusted_volume_24h_share']; ?></td>
                        <td>Price: <?php echo $coins['quotes']['USD']['price']; ?><br />Volume 24H: <?php echo $coins['quotes']['USD']['volume_24h']; ?></td>
                        <td><?php echo $coins['last_updated']; ?></td>
                    </tr>
                    <?php endforeach; ?>
               
               
            </tbody>
        </table>
        
       
        
    </body>
       
    
</html>    


<script type="text/javascript">
    $(document).ready(function(){
          console.log(js_json.length);
          console.log(js_json);
          
          $('#example').DataTable();
      
    });
</script>