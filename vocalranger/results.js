let lowNote = localStorage.getItem('lowNote');
let highNote = localStorage.getItem('highNote');
let body = document.querySelector("body");
let text = document.createElement("h1");
let node = document.createTextNode(lowNote + " to " + highNote);
text.append(node);



//body.insertBefore(text, body.childNodes[1]);

//sug4r
let element1 = document.getElementById("vrcont");
element1.appendChild(text);
