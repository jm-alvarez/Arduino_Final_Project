# Arduino_Final_Project
 This is my final project in Arduino Subject, Arduino-based temperature and humidity sensor for residents using esp8266 and DHT11.


Hardware Requirements:
 -NodeMCU(ESP8266)
 -DHT11 Sensor
 -Wires
 -MicroUSB for Power Source and Uploading of code


Software Requirements: 
 -XAMPP
 -Arduino Software


Installation Instruction:

 Step-1: Install XAMPP and Arduino software.
 Step-2: Copy and Paste 'dht_php folder' to your htdocs folder inside your XAMPP Folder.
 Step-3: Copy and Paste 'DHT11_with_NodeMCU' folder to your Arduino Installation Path.
 Step-4: Open XAMPP Appication and Start 'MySQL' then click'Admin' and 'Apache' server then in phpmyadmin page, import 'tbl_dht.sql' file.
 Step-5: Prepare the board and connect it(see 'circuit_img.png' for the Schematic or connection of wires).
 Step-6: Open DHT11_with_NodeMCU.ino using Arduino Software then change some line of code(details inside the DHT11_with_NodeMCU.ino).
 Step-6: Upload the code to Board, after finished uploading you can see in the 'Serial Monitor' the status. 
 Step-7: Then on your browser type the link http://'change_this_with_your_pc's_ipaddress'/index.php.
 Step-8: Hope it work, have a good time <3.
