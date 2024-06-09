## Basic
**1. scrape_var_feed.php:** find out the variable from that feed.xml file and saved it to **var_names.txt** <br>
**2. var_names.txt:** listed all of the variables from feed.xml by runnung **scrape_var_feed.php:** <br>
**3. config_mysql.php:** MySQL configuration. <br>
**a) Database name:** db_task<br>
**b) Table name:** products	<br>
**4. index.php:** main file that pushes feed.xml data to the MySQL database<br>
**5. products.sql:** Final SQL file (from feed.xml)
## Test
**6. errors.log:** errors log when you push duplicate or twice.<br>
**7. test_feed.xml** test xml file with one entry, which you can modify by changing entity_id<br>
**8. import_data.php and generate_report.php:** help to push the test XML to the database and generate a report named **database_report.txt** where you can see changes in the number of push data if successfully pushed otherwise number of current data cells.<br>
## Commands
* *php scrape_var_feed.php* *<br>
* *php index.php* *<br>
* *php generate_report.php* *<br>

