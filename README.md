# hackmesite
PHP site ready to be hacked 

# Deploy
- Deploy Web App In Azure. Here's a sample template: https://github.com/Azure/azure-quickstart-templates/tree/master/101-webapp-basic-linux <br/>
- Enable In-App MySQL: https://blogs.msdn.microsoft.com/appserviceteam/2017/03/06/announcing-general-availability-for-mysql-in-app/ <br/>
- Import the localdb.sql content to MySQL using sitename.scm.azurewebsites.net/phpmyadmin<br/>
- Using FTP go to /data/mysql/MYSQLCONNSTR_localdb.ini and take note of the port, username and password to connect to the DB<br/>
- Edit db.php and populate the fields for connecting to the DB<br/>
