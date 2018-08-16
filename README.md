# Goku
Goku is an event center ot management project event and processors

### Screenshots
- Event publisher's event list
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/publisher-event-list.png)
- Event publisher's event history
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/publisher-event-history.png)
- Event publisher's event history process list
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/publisher-event-history-processor-list.png)
- Event listener search project
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/listener-search-project.png)
- Event listener add processor
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/listener-add-processor.png)
 - Event listener processor list
 ![image](https://github.com/MichaelLuthor/Goku/raw/master/Document/Screenshot/listener-processor-list.png)
 
### Api Calling
URL : http://goku.local/index.php?module=api&action=trigger

Method : POST

Data : 
account={account-name}&data={"project":"{project-id}","event":"{event-id}","data":"{event-data}"}&timestamp={timestamp}&rand={rand-code}&sign={sign-code}

- {account-name}  api account name 
- {data} parameters to trigger api
    - {project-id} project identfier
    - {event-id} event identfier
    - {event-data} event data in json formate
- {timestamp}  the timestamp of calling
- {rand-code} rand-code to call the api
-{sign} the signature to the service
<pre>
 # generate sign in php
 
 function generateSign( $data ) {
     ksort($data);
     foreach ( $data as $key => $value ) {
         $data[$key] = $key.'='.$value;
     }
     $data = implode(';', $data);
     return md5(implode('&', array(
         '{account_secret}',
         $data,
         '{timestamp}',
         '{rand}',
     )));
 }
 
# for example : 
# account=sige
# data={"project":"pro-suanhetao","event":"pro-food-turorial-published","data":"{}"}
# timestamp=1
# rand=1
# The result sign = 32c6fa664464a869fdac639b8f5a7dfe
</pre>


## assets resources

- bootstrap v3
