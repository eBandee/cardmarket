Erram's Cardmarket
==================

http://hipsum.co/

Before they sold out sustainable messenger bag, Tumblr iPhone mumblecore
synth bitters narwhal leggings cornhole Portland beard. Umami pork
belly skateboard, flannel Portland four dollar toast banjo. Kitsch
semiotics messenger bag locavore Pinterest fingerstache. Cliche pickled
PBR biodiesel chillwave. Typewriter yr flexitarian crucifix, aesthetic pop-up
Tumblr ugh banh mi paleo lomo shabby chic Tonx organic chillwave. Echo Park
iPhone Blue Bottle, cliche yr four dollar toast beard stumptown McSweeney's squid
slow-carb readymade sartorial Pitchfork wolf. Fap ethical tousled, iPhone Bushwick
XOXO pug vegan Odd Future banjo plaid post-ironic.

Telepítés
---------

Ide írjuk le, hogy a különböző oprendszereken hogyan kell telepíteni az alkalmazást.

### Ubuntu/Debian

```sh
cd /var/www

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

git clone git@github.com:eBandee/cardmarket.git

cd ./cardmarket
composer install

cp config/db.php.example config/db.php # db.php-t értelemszerűen ki kell tölteni

./yiic migrate/up
```

### Windows

### OSX

Konvenciók
----------

Ide majd gyűjtögetjük az idők során, hogy mikre kell odafigyelni a kódolás közben.
Formázás, szemantika, struktúra...
