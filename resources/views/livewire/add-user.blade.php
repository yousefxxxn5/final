<div>
    {{-- @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="row">
            <!-- Input for Full Name -->
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your Username">

                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- Input for Serial Number -->
            <div class="col-md-6 mb-3">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" placeholder="Enter your Serial Number">
                @error('serial_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form> --}}


    <!-- تضمين مكتبة Bootstrap -->
    @if (session('add'))
        <div id="floating-alert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-between;
        ">
            <span>{{ session('add') }}</span>
            <button onclick="document.getElementById('floating-alert').style.display='none'" style="
                background: none;
                border: none;
                color: white;
                font-size: 16px;
                font-weight: bold;
                margin-left: 10px;
                cursor: pointer;
            ">&times;</button>
        </div>
    @endif




    <style>
        .code-container {
            max-height: 300px;
            background: #272822;
            border-radius: 8px;

            color: #f8f8f2;
            text-align: left;
            white-space: pre-wrap;
            overflow-x: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 16px;
        }

        button {
            background-color: #66d9ef;
            border: none;
            color: #272822;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e90ff;
            color: white;
        }
    </style>


    <div class="container text-center">
        <h1 class="text-info mb-4">Code Generator</h1>
        <div class="code-container mb-3" id="codeDisplay">

            #include <WiFi.h>
                #include <HTTPClient.h>
                    #include "esp_timer.h"

                    // username :{{ $username }}
                    // seriallNumber : {{ $serial_number }}
                    #include <WiFi.h>
                        #include <HTTPClient.h>
                            #include "esp_timer.h"

                            const char* ssid = "Y";
                            const char* password = "yousef77538";
                            volatile bool is_on = false;
                            volatile bool is_cont = false;
                            volatile bool start = true;
                            volatile int count = 0;
                            int batteryValue = 50;
                            int electricalValue = 1;
                            void IRAM_ATTR onTimer(void* arg) {
                            if (is_cont) {
                            count++;
                            }
                            Serial.println("Timer triggered every 20 seconds!");
                            if (WiFi.status() == WL_CONNECTED) {
                            HTTPClient http;
                            String url = "http://yemen778467871.pagekite.me/api/decat";
                            http.begin(url);
                            http.addHeader("Content-Type", "application/json");
                            String jsonPayload = "{\"id\":\"1\",\"battery\":\"" + String(batteryValue) +
                            "\",\"electrical\":\"" + String(electricalValue) + "\"}";
                            int httpResponseCode = http.POST(jsonPayload);
                            if (httpResponseCode > 0) {
                            Serial.print("HTTP Response Code: ");
                            Serial.println(httpResponseCode);
                            String response = http.getString();
                            Serial.println("Response:");
                            } else {
                            Serial.print("Error on HTTP request: ");
                            Serial.println(http.errorToString(httpResponseCode).c_str());
                            }
                            http.end();
                            } else {
                            Serial.println("WiFi not connected!");
                            }
                            }
                            void setup() {
                            Serial.begin(115200);
                            WiFi.begin(ssid, password);
                            Serial.print("Connecting to Wi-Fi");
                            while (WiFi.status() != WL_CONNECTED) {
                            delay(500);
                            Serial.print(".");
                            }
                            Serial.println("\nConnected to Wi-Fi!");
                            Serial.print("IP Address: ");
                            Serial.println(WiFi.localIP());
                            esp_timer_create_args_t timerArgs = {
                            .callback = &onTimer,
                            .arg = NULL,
                            .dispatch_method = ESP_TIMER_TASK,
                            .name = "MyTimer"
                            };
                            esp_timer_handle_t timerHandle;
                            esp_timer_create(&timerArgs, &timerHandle);
                            esp_timer_start_periodic(timerHandle, 20000000);
                            }
                            void loop() {
                            if (start) {
                            start = false;
                            if (WiFi.status() == WL_CONNECTED) {
                            HTTPClient http;
                            String url = "http://yemen778467871.pagekite.me/api/decat";
                            http.begin(url);
                            http.addHeader("Content-Type", "application/json");
                            String jsonPayload = "{\"id\":\"1\",\"battery\":\"50\",\"electrical\":\"1\"}";
                            int httpResponseCode = http.POST(jsonPayload);
                            if (httpResponseCode > 0) {
                            Serial.print("HTTP Rasponse Code: ");
                            Serial.println(httpResponseCode);
                            String response = http.getString();
                            Serial.println("Rasponse:");
                            Serial.println(response);
                            } else {
                            Serial.print("Error on HTTP raquest: ");
                            Serial.println(http.errorToString(httpResponseCode).c_str());
                            }
                            http.end();
                            } else {
                            Serial.println("WiFi not connected!");
                            }
                            }
                            } </div>
        <button wire:click="genration" wire:loading.attr="disabled" class="btn btn-primary px-4 mb-2"
            id="generateButton">توليد
        </button>
        <button class="btn btn-secondary px-4" id="copyButton">نسخ

        </button>
    </div>

    <script>
        copyButton.addEventListener("click", () => {
            const textToCopy = codeDisplay.textContent;
            navigator.clipboard.writeText(textToCopy).then(() => {
                alert("تم النسخ بنجاح!");
            }).catch(err => {
                console.error("حدث خطأ أثناء النسخ: ", err);
            });
        });
    </script>
</div>
