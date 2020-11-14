SMU student project repository.

1)Username - password (all username are the same as passwords)
jiaruey - jiaruey
yuhao - yuhao 
yangfan - yangfan
zhaoqi -zhaoqi 
jiaying - jiaying

Accounts created for Profs (same format, username and password are the same)
lkshar - lkshar
layfoo - layfoo

2)How to set up your application based on the submitted file(s)
a) locate the SQL file (load.sql) in /app/database/load.sql
b) locate the ConnectionManager.php in /app/objects/ConnectionManager.php
 i) for Windows user, line 6 should be -> $password = "";
 ii) for MAC user, line 6 should be -> $password = "root";

3)How to run your application
a) Creating a new account
 i) Username and password have to contain at least 5 characters
 ii) Password and confirm password has to match

b)Bus Function
 i)Actions that will cause errors.
  -Empty bus stop code field
  -Invalid bus stop code
 ii)Key in bus stop code (there is suggest bus stop codes accordingly to code entered into the field)
 iii) Bus stop list
  - All buses (displays all buses info)
  - User can select and display multiple bus informations by pressing ctrl + click the bus services 
 iv) Refresh bus arrival timings by clicking on refresh button at the botton of the bus arrival table

c)MRT Function
 i)Map
  -Has mrt line overlay ontop of the map
  -Zoom in and out to locate mrt stations near the desired destination
ii)List of disrupted lines
 -No disrupted lines (display "There is no disruption to MRT services currently. ✓")
 -Disrupted lines (Displays a list of checkboxes of disrupted lines)
iii)Check the checkboxes to display the information of the lines

d)Incident Function
 i)Map
 -On first load it displays user's current location
 -Displays dropdown pin of selected incident location
 ii)Able to choose to display 5,10,15,20 or all incident list in the table 
 iii)Search box
 -Type highways,roadworks, roadnames, time or dates to filter accordingly
 iv) Click radio buttons located beside the respectively incidents to display the location of the incident

e) Click log out button on top right hand corner to log out of your account
