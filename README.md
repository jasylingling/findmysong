# Web Application - 🎵 Find my song! 🔍

### Autor: Jasmin Fischli 🌈

### Version: 1.0.0

<br>

## Wichtige Informationen für die Benutzung und Installation der Web Application "Find my song!":

<br>

**🗄 DATENBANK**
<br>
Die Zugangsdaten zur SQL-Datenbank befinden sich unter `model/Db.php`. Gegebenenfalls müssen die Angaben wie DB-Passwort angepasst werden:

```php
protected $dbHost = 'localhost'; /** Database Host */
protected $dbUser = 'root'; /** Database Root */
protected $dbPass = ''; /** Database Password => xampp: {empty} / mamp: root */
protected $dbName = 'findmysong'; /** Database Name */
```

<br>

**🔐 LOGIN FÜR DEN REGISTRIERTEN BEREICH**

- Username: `testuser`
- Passwort: `test123`

<br>

**🤝 ANERKENNUNG**

Das Login und Signup System basiert auf `https://github.com/learningdollars/stephenilori-php-pdo`.
