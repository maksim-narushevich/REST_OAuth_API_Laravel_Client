**HOT TO INSTALL APP**
--
     
* *Create shared docker network in order to communicate with Server:*

        docker network create restapi_default
        
* *Start app and build required Docker containers:*

        docker-compose up -d
      
* *Install all composer dependencies:*

        docker exec -it restapi_client composer install
            
App is available on ``8309`` port
--
    http://127.0.0.1:8309
