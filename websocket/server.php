<?php
$host = '127.0.0.1';
$port = 8080;
$null = NULL;

$qa_pairs = [
    'How do I search for flights, hotels, or vacation packages?' => 'To search for flights, hotels, or vacation packages, go to the homepage of our website. Use the search bar to enter your destination, travel dates, and any other preferences such as the number of travelers. Click the "Search" button to view available options. You can filter and sort the results based on your preferences.!',
    'How can I create an account on your website?' => 'To create an account, click on the “Sign Up” button located at the top right corner of the homepage. Fill out the required fields with your personal information, such as your name, email address, and password. After submitting the form, you will receive a confirmation email to verify your account. Follow the instructions in the email to complete the registration process.',
    'Can I modify or cancel my booking?' => 'Yes, you can modify or cancel your booking by logging into your account and going to the “My Bookings” section. Click on the booking you wish to modify or cancel and follow the instructions. Please note that modification and cancellation policies vary depending on the airline, hotel, or tour provider.',
    'What is the cancellation policy for my booking?' => 'The cancellation policy depends on the specific terms set by the airline, hotel, or tour provider. You can find the cancellation policy for your booking in the confirmation email or in the “My Bookings” section of your account. If you need further assistance, please contact our customer support team.',
    'Why was my payment declined?' => 'Your payment might have been declined due to various reasons, including insufficient funds, incorrect payment details, or issues with your payment provider. Check the details you entered and ensure you have sufficient funds. If the issue persists, contact your payment provider or try using a different payment method.',
    'How do I contact customer support?' => 'You can contact our customer support team through “contact info” page on our website for options such as email support, live chat, or phone support. Our team is available 24/7 to assist you with any questions or issues.',
    'What should I do if I encounter issues while traveling?' => 'If you experience issues while traveling, such as flight delays or hotel problems, contact the respective service provider directly. For urgent matters or if you need further assistance, reach out to our customer support team through the “Contact Us” page.',
    'What should I pack for my trip?' => 'What you should pack depends on your destination, weather, and planned activities. We recommend making a packing list based on your trip’s requirements. For general travel tips and packing suggestions, visit our “Travel Tips” section.',
    'Why is your website not loading properly?' => 'If our website is not loading properly, it may be due to a temporary technical issue or a problem with your internet connection. Try refreshing the page or clearing your browser cache. If the problem persists, contact our support team for assistance.',
];

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($socket, $host, $port);
socket_listen($socket);

$clients = [$socket];

echo "WebSocket server started on ws://$host:$port\n";

while (true) {
    $changed = $clients;
    socket_select($changed, $null, $null, 0, 10);

    if (in_array($socket, $changed)) {
        $socket_new = socket_accept($socket);
        $clients[] = $socket_new;
        $header = socket_read($socket_new, 1024);
        perform_handshaking($header, $socket_new, $host, $port);
        socket_getpeername($socket_new, $ip);
        echo "New connection from $ip\n";
        $found_socket = array_search($socket, $changed);
        unset($changed[$found_socket]);
    }

    foreach ($changed as $changed_socket) {
        while (socket_recv($changed_socket, $buf, 1024, 0) >= 1) {
            $received_text = unmask($buf);
            $message = json_decode($received_text, true);

            $received_message = $message['message'];
            $response_text = 'I do not understand your question.';

            if (array_key_exists($received_message, $qa_pairs)) {
                $response_text = $qa_pairs[$received_message];
            }

            $response_text = mask(json_encode(['message' => $response_text]));
            send_message($response_text);
            echo "Received: " . $received_message . "\n";
            echo "Sent: " . $response_text . "\n";
            break 2;
        }

        $buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
        if ($buf === false) {
            $found_socket = array_search($changed_socket, $clients);
            unset($clients[$found_socket]);
            echo "Client disconnected\n";
        }
    }
}

socket_close($socket);

function send_message($msg) {
    global $clients;
    foreach ($clients as $changed_socket) {
        @socket_write($changed_socket, $msg, strlen($msg));
    }
    return true;
}

function unmask($text) {
    $length = ord($text[1]) & 127;
    if ($length == 126) {
        $masks = substr($text, 4, 4);
        $data = substr($text, 8);
    } elseif ($length == 127) {
        $masks = substr($text, 10, 4);
        $data = substr($text, 14);
    } else {
        $masks = substr($text, 2, 4);
        $data = substr($text, 6);
    }
    $text = "";
    for ($i = 0; $i < strlen($data); ++$i) {
        $text .= $data[$i] ^ $masks[$i % 4];
    }
    return $text;
}

function mask($text) {
    $b1 = 0x80 | (0x1 & 0x0f);
    $length = strlen($text);

    if ($length <= 125) {
        $header = pack('CC', $b1, $length);
    } elseif ($length > 125 && $length < 65536) {
        $header = pack('CCn', $b1, 126, $length);
    } else {
        $header = pack('CCNN', $b1, 127, $length);
    }
    return $header . $text;
}

function perform_handshaking($receved_header, $client_conn, $host, $port) {
    $headers = array();
    $lines = preg_split("/\r\n/", $receved_header);
    foreach ($lines as $line) {
        $line = chop($line);
        if (preg_match('/\A(\S+): (.*)\z/', $line, $matches)) {
            $headers[$matches[1]] = $matches[2];
        }
    }
    $secKey = $headers['Sec-WebSocket-Key'];
    $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
    $upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
               "Upgrade: websocket\r\n" .
               "Connection: Upgrade\r\n" .
               "WebSocket-Origin: $host\r\n" .
               "WebSocket-Location: ws://$host:$port/demo/shout.php\r\n" .
               "Sec-WebSocket-Accept:$secAccept\r\n\r\n";
    socket_write($client_conn, $upgrade, strlen($upgrade));
}
?>
