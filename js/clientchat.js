//const ws = new WebSocket("ws://minyazev.ru:3005");
const ws = new WebSocket("ws://localhost:3005");

ws.addEventListener ("message", function (event){
    const data = JSON.parse(event.data);
    if(data.type === "message"){
        addMessage(data.data);
    }
});

function addMessage(message){
    const node = document.createElement("p");
    const text = document.createTextNode (message);

    node.appendChild(text);
    document.getElementById("chat").appendChild(node);
}

function sendMessage(){
    const message = document.getElementById("message").value;
    if(!message) return false;
    ws.send (JSON.stringify({type: "message", data:message}));
    addMessage(message);
    document.getElementById.value = "";
}