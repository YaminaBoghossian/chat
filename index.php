
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awesome Chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>
        #chat {
            background-color: lightgray;
            height: 50vh;
            overflow-y: scroll
        }
    </style>
</head>

<body class="container">
    <h1 class="text-center">Awesome Chat</h1>
    <div class="justify-content-md-center mt-5">
        <div id="chat" class="col-md-10 offset-md-1">
        </div>
        <form action="new-message.php" class="col-md-8 offset-md-2 mt-3">
            <label for="message">Message:</label>
            <input type="text" name= "message" id="message" placeholder="Say hi!" class="form-control">
            <input type="submit" id="submit-message" value="Send" class="btn btn-primary">
        </form>
    </div>
    <script>
        "use strict";
        // Model: we store the data and make it accessible by all the script.
        let messages = [];

        // View: this is the only place in our code where we display the data.
        function display() {
            let div = document.querySelector("#chat");
            div.innerHTML = "";
            for (let m of messages) {
                let p = document.createElement("p");
                p.textContent = m;
                div.appendChild(p);
            }
        }
        display();

        // We watch click on #submit-message to send user message using AJAX.
        let submitMessage = document.querySelector("#submit-message");
        submitMessage.addEventListener("click", function(e) {
            e.preventDefault();
            let input = document.querySelector("#message");
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "new-message.php");
            xhr.onreadystatechange = postMessageHandler;
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("message=" + input.value);

        });

        // postMessageHandler handles readystatechange from an XHR.
        function postMessageHandler() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    let text = document.querySelector("#message").value;
                    //console.log("success: " + this.responseText);
                    // Controller: we update our data and ask for a new display.
                    messages.push(text);
                    display();
                } else {
                    console.error("unexpected status:" + this.status);
                    console.error(this.response);
                }
            }
        }
    </script>
</body>

</html>