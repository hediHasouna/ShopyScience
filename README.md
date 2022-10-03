-Après la téléchargement du script merci de pointer vers le dossier

cd /project-name


-Lancer docker :
docker-compose up -d

-Récupérer l'id du container php :
docker ps

-Merci de pointer vers le container :

docker exec -it id_container_php bash

-Lancer symfony en arrière :

symfony server:start -d

-Créer la base de donnée :

php bin/console doctrine:database:create
php bin/console make:migration


Maintenant merci de déplacer vers http://localhost:5000/login
