# Web Application - ๐ต Find my song! ๐

### Autor: Jasmin Fischli ๐

### Version: 1.0.0

<br>

## Wichtige Informationen fรผr die Benutzung und Installation der Web Application "Find my song!":

<br>

**๐ DATENBANK**
<br>
Die Zugangsdaten zur SQL-Datenbank befinden sich unter `model/Db.php`. Gegebenenfalls mรผssen die Angaben wie DB-Passwort angepasst werden:

```php
protected $dbHost = 'localhost'; /** Database Host */
protected $dbUser = 'root'; /** Database Root */
protected $dbPass = ''; /** Database Password => xampp: {empty} / mamp: root */
protected $dbName = 'findmysong'; /** Database Name */
```

<br>

**๐ LOGIN FรR DEN REGISTRIERTEN BEREICH**

- Username: `testuser`
- Passwort: `test123`

<br>

**๐ค ANERKENNUNG**

Das Login und Signup System basiert auf `https://github.com/learningdollars/stephenilori-php-pdo`.
