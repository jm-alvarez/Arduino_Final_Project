#include <ESP8266HTTPClient.h>

#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <Hash.h>
#include <ESPAsyncTCP.h>
#include <ESPAsyncWebServer.h>
#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <ArduinoWiFiServer.h>
#include <BearSSLHelpers.h>
#include <CertStoreBearSSL.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiAP.h>
#include <ESP8266WiFiGeneric.h>
#include <ESP8266WiFiGratuitous.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266WiFiSTA.h>
#include <ESP8266WiFiScan.h>
#include <ESP8266WiFiType.h>
#include <WiFiClient.h>
#include <WiFiClientSecure.h>
#include <WiFiClientSecureBearSSL.h>
#include <WiFiServer.h>
#include <WiFiServerSecure.h>
#include <WiFiServerSecureBearSSL.h>
#include <WiFiUdp.h>
#include <ESP8266HTTPClient.h>

#define DPIN 4
#define DTYPE DHT11
DHT dht(DPIN,DTYPE);

#define HOST "localhost";
#define ssid "DHT_WIFI";
#define password "12345678";

String sendTemp, sendHum, postData;

void checkWiFiConnection(){
  while(WiFi.status() != WL_CONNECTED){
    Serial.println("Connecting to Wi-Fi");
  }

  Serial.println("Connected to Wi-Fi.");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

}

void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  dht.begin();
  Serial.println("Communication started\n");

  WiFi.mode(WIFI_STA);
  WiFi.begin("DHT_WIFI","12345678");
  checkWiFiConnection();
}

void loop() {
  // put your main code here, to run repeatedly:
  checkWiFiConnection();
  WiFiClient client;
  HTTPClient http;

  float temperatureCel = dht.readTemperature(false);
  float humidity = dht.readHumidity();

  sendTemp = String(temperatureCel);
  sendHum = String(humidity);

  postData = "sendTemp=" + sendTemp + "&sendHum=" + sendHum;
  Serial.print("Sending data: ");
  Serial.println(postData);
  http.begin(client, "http://192.168.244.55/arduino/try.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode = http.POST(postData);

  if(httpCode == HTTP_CODE_OK){
    String response = http.getString();
    Serial.println("Server response: " + response);
  } else {
    Serial.print("HTTP POST request failed with error code: ");
    Serial.print(httpCode);

    if(httpCode == HTTPC_ERROR_CONNECTION_REFUSED){
      Serial.println("Connection refused by the server.");
    } else if(httpCode == HTTP_CODE_NOT_FOUND){
      Serial.println("Server resources not .");
    } else {
      Serial.print("Unknown error occured.");
    }
  }

  http.end();
  delay(5000);

}
