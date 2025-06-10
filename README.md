# Aanwezigheden Webapplicatie

Een eenvoudige webapplicatie om aanwezigheden bij te houden per klasgroep, datum en periode. Gemaakt met PHP, MySQL en jQuery.

## Hoe maak je het klaar voor gebruik

### Stap 1  
Download de volledige projectmap.

### Stap 2  
Installeer een webserver met PHP en MySQL, bijvoorbeeld [XAMPP](https://www.apachefriends.org/nl/index.html).

### Stap 3  
Importeer het bestand `database_dummy_data.sql` in je MySQL database. Dit maakt de benodigde tabellen aan en vult deze met voorbeelddata.

### Stap 4  
Pas de databaseverbinding aan in het bestand `website/includes/dbh.php`. Vul hier je eigen databasegegevens in (host, gebruikersnaam, wachtwoord, databasenaam).

### Stap 5  
Start de webserver en open `website/index.php` in je browser.

## Vereisten

- PHP (bij voorkeur versie 7 of hoger)
- MySQL database
- Webserver zoals Apache (bijvoorbeeld via XAMPP)
- Internetverbinding voor Bootstrap en jQuery CDN

## Code aanpassen

Pas in `website/includes/dbh.php` de volgende gegevens aan met je eigen databasegegevens:

```php
<?php
$servername = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$dbname = "jouw_databasenaam";
$conn = new mysqli($servername, $username, $password, $dbname);
?>
```

## Over

Deze webapplicatie toont aanwezigheden van gebruikers per klasgroep, datum en periode. De data wordt opgeslagen in een MySQL database en opgehaald via PHP scripts.

---
Gemaakt met PHP, MySQL, Bootstrap en jQuery.
