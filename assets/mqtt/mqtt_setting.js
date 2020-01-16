// Called after form input is processed
function startConnect() {
    // Generate a random client ID
    clientID = "clientID-" + parseInt(Math.random() * 100);

    // Fetch the hostname/IP address and port number from the form
    host = "tailor.cloudmqtt.com";
    port = "32241";

    // Print output for the user in the messages div
    document.getElementById("messages").innerHTML += '<span>Connecting to: ' + host + ' on port: ' + port + '</span><br/>';
    document.getElementById("messages").innerHTML += '<span>Using the following client value: ' + clientID + '</span><br/>';

    // Initialize new Paho client connection
    client = new Paho.MQTT.Client(host, Number(port), clientID);

    // Set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    // Connect the client, if successful, call onConnect function
	client.connect({
	  useSSL: true,
      userName: "qlnzqwhk",
      password: "ojPBiWN32mq_",
      onSuccess: onConnect
    });
}

// Called when the client connects
function onConnect() {
    // Fetch the MQTT topic from the form
    topic = "Carepol";

    // Print output for the user in the messages div
    document.getElementById("messages").innerHTML += '<span>Subscribing to: ' + topic + '</span><br/>';

    // Subscribe to the requested topic
    client.subscribe(topic);
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    console.log("onConnectionLost: Connection Lost");
    if (responseObject.errorCode !== 0) {
        console.log("onConnectionLost: " + responseObject.errorMessage);
    }
    startConnect();
}

// Called when a message arrives
function onMessageArrived(message) {
    console.log("onMessageArrived: " + message.payloadString);
    try {
        var data_message = JSON.parse(message.payloadString);
        document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '  | ' + data_message.key_alat + '</span><br/>';
        $('#key_alat').text(data_message.key_alat);
        insertparameter(data_message);
        updateScroll(); // Scroll to bottom of window
    } catch(e) {
        console.log("onMessageArrived: " + message.payloadString); // error in the above string (in this case, yes)!
    }
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
    updateScroll(); // Scroll to bottom of window
}

// Updates #messages div to auto-scroll
function updateScroll() {
    var element = document.getElementById("messages");
    element.scrollTop = element.scrollHeight;
}