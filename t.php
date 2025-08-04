<?php
die(0); 

include_once "function.php";
//functions for the daily analytics 

function record_analytics_data()
{
    function get_current_url()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];

        return $url;
    }

    function get_current_title($data = FALSE)
    {
        if ($data == FALSE) {
            $url = get_current_url();
        } else {
            $url = $data;
        }

        try {
            if (file_exists($url)) {
                $page = file_get_contents($url);
                $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
            } else {
                $title = 'None';
            }
        } catch (Exception $e) {
            // Handle any exceptions that occurred
            echo "An error occurred: " . $e->getMessage();
            $title = 'None';
        }
        return $title;
    }

    function getuserip()
    {
        switch (true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])):
                return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])):
                return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SESSION['HTTP_X_FORWARDED_FOR'])):
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default:
                return $_SERVER['REMOTE_ADDR'];
        }
    }

    function get_tracking_user_ip()
    {
        $data = getuserip();
        return $data;
    }

    function get_tracking_device_details($state)
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $deviceDetails = array(
            'model' => '',
            'make' => '',
            'operating_system' => '',
            'browser' => ''
        );

        // Match common device models and makes
        if (preg_match('/iPhone/', $userAgent)) {
            $deviceDetails['model'] = 'iPhone';
            $deviceDetails['make'] = 'Apple';
        } elseif (preg_match('/iPad/', $userAgent)) {
            $deviceDetails['model'] = 'iPad';
            $deviceDetails['make'] = 'Apple';
        } elseif (preg_match('/Macintosh/', $userAgent)) {
            $deviceDetails['make'] = 'Apple';
            if (preg_match('/Mac OS X/', $userAgent)) {
                $deviceDetails['model'] = 'Mac';
            } else {
                $deviceDetails['model'] = 'Unknown Macintosh Device';
            }
        } elseif (preg_match('/Windows/', $userAgent)) {
            $deviceDetails['make'] = 'Microsoft';
            if (preg_match('/Windows NT 10/', $userAgent)) {
                $deviceDetails['model'] = 'Windows 10 PC';
            } elseif (preg_match('/Windows NT 6.3/', $userAgent)) {
                $deviceDetails['model'] = 'Windows 8.1 PC';
            } elseif (preg_match('/Windows NT 6.2/', $userAgent)) {
                $deviceDetails['model'] = 'Windows 8 PC';
            } elseif (preg_match('/Windows NT 6.1/', $userAgent)) {
                $deviceDetails['model'] = 'Windows 7 PC';
            } elseif (preg_match('/Windows NT 6.0/', $userAgent)) {
                $deviceDetails['model'] = 'Windows Vista PC';
            } elseif (preg_match('/Windows NT 5.1/', $userAgent)) {
                $deviceDetails['model'] = 'Windows XP PC';
            } else {
                $deviceDetails['model'] = 'Unknown Windows PC';
            }
        } elseif (preg_match('/Android/', $userAgent)) {
            $deviceDetails['make'] = 'Android';
            if (preg_match('/Mobile/', $userAgent)) {
                if (preg_match('/Build/', $userAgent)) {
                    preg_match('/\((.*?)\)/', $userAgent, $matches);
                    $deviceDetails['model'] = $matches[1];
                } else {
                    $deviceDetails['model'] = 'Android Phone';
                }
            } else {
                $deviceDetails['model'] = 'Android Tablet';
            }
        } elseif (preg_match('/Linux/', $userAgent)) {
            $deviceDetails['make'] = 'Linux';
            $deviceDetails['model'] = 'Unknown Linux Device';
        } else {
            $deviceDetails['make'] = 'Unknown';
            $deviceDetails['model'] = 'Unknown Device';
        }

        // Match common operating systems
        if (preg_match('/iPhone OS/', $userAgent)) {
            $deviceDetails['operating_system'] = 'iOS';
        } elseif (preg_match('/Windows NT/', $userAgent)) {
            $deviceDetails['operating_system'] = 'Windows';
        } elseif (preg_match('/Android/', $userAgent)) {
            $deviceDetails['operating_system'] = 'Android';
        } elseif (preg_match('/Mac OS X/', $userAgent)) {
            $deviceDetails['operating_system'] = 'macOS';
        } elseif (preg_match('/Linux/', $userAgent)) {
            $deviceDetails['operating_system'] = 'Linux';
        } else {
            $deviceDetails['operating_system'] = 'Unknown';
        }

        // Match Common Browser System 
        if (preg_match('/Edge/', $userAgent)) {
            $deviceDetails['browser'] = 'Microsoft Edge';
        } elseif (preg_match('/Chrome/', $userAgent)) {
            $deviceDetails['browser'] = 'Google Chrome';
        } elseif (preg_match('/Firefox/', $userAgent)) {
            $deviceDetails['browser'] = 'Mozilla Firefox';
        } elseif (preg_match('/Safari/', $userAgent)) {
            $deviceDetails['browser'] = 'Apple Safari';
        } elseif (preg_match('/Opera/', $userAgent)) {
            $deviceDetails['browser'] = 'Opera';
        } elseif (preg_match('/MSIE/', $userAgent) || preg_match('/Trident/', $userAgent)) {
            $deviceDetails['browser'] = 'Internet Explorer';
        } else if (preg_match('/Maxthon/i', $userAgent)) {
            $deviceDetails['browser'] = 'Maxthon';
        } else if (preg_match('/Netscape/i', $userAgent)) {
            $deviceDetails['browser'] = 'Netscape';
        } else if (preg_match('/Konqueror/i', $userAgent)) {
            $deviceDetails['browser'] = 'Konqueror';
        } else {
            $deviceDetails['browser'] = 'Unknown';
        }

        if (strtolower($state) == "model") {
            return ($deviceDetails['model']);
        } else if (strtolower($state) == "make") {
            return ($deviceDetails['make']);
        } else if (strtolower($state) == "browser") {
            return ($deviceDetails['browser']);
        } else {
            return ($deviceDetails['operating_system']);
        }
    }

    function get_tracking_location($state, $ip_address = FALSE)
    {

        if ($ip_address == FALSE) {
            $receive_ip = getuserip();
            #Receieve The System IP Address
        } else {
            $receive_ip = $ip_address;
        }

        $url = "http://ip-api.com/json/{$receive_ip}";

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Decode the JSON response
        $locationData = json_decode($response, true);

        // Extract relevant location information
        $location = array(
            'country' => isset($locationData['country']) ? $locationData['country'] : '',
            'city' => isset($locationData['city']) ? $locationData['city'] : ''
        );

        if (strtolower($state) == "country") {
            return ($location['country']);
        } else {
            return ($location['city']);
        }
    }



    $page_link = get_current_url();
    $page_title = get_current_title();

    $ip_code = (get_tracking_user_ip());
    #Retrieve The IP Code 

    $user_code = '';
    #Get The User Code 

    if (get_tracking_location('country') == "") {
        $country =  ('Hidden');
    } else {
        $country =  (get_tracking_location('country'));
    }

    if (get_tracking_location('city') == "") {
        $city =  ("Hidden");
    } else {
        $city =  (get_tracking_location('city'));
    }
    #Get the location 

    $os = get_tracking_device_details('operating_system');
    $make = get_tracking_device_details('make');
    $model = get_tracking_device_details('model');
    $browser = get_tracking_device_details('browser');
    #Extracting Device Details 

    $tracking_session = '';


    //``, ``, ``, `business_code`
    $analyics_read = [
        'tracking_session' => $tracking_session,
        'user_session' => $user_code,
        'ip_address' => $ip_code,
        'country' => $country,
        'city' => $city,
        'model' => $model,
        'make' => $make,
        'operating_system' => $os,
        'browser' => $browser,
        'Website_code' => '',
        'page_title' => $page_title,
        'page_link' => $page_link,
    ];

    $analytics_log_file = __DIR__ . "/DATA_SETS/traffic_pack.json";
    if (file_exists($analytics_log_file)) {
        $_data = json_decode(simple_decryption(file_get_contents($analytics_log_file)), JSON_PRETTY_PRINT);
        //LOAD EXISTING DATA;
    } else {
        $_data = [];
    }

    $_data[] = $analyics_read;

    $data = simple_encryption(json_encode($_data, JSON_PRETTY_PRINT));
    $return = file_put_contents($analytics_log_file, $data);
    return $return;
}

record_analytics_data();

function read_analytics_data()
{
    $analytics_log_file = __DIR__ . "/DATA_SETS/traffic_pack.json";
    if (file_exists($analytics_log_file)) {
        $_data = json_decode(simple_decryption(file_get_contents($analytics_log_file)), JSON_PRETTY_PRINT);
        //LOAD EXISTING DATA;

        return $_data;
    }
}

print(json_encode(read_analytics_data(), JSON_PRETTY_PRINT));
