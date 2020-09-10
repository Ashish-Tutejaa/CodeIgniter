const print = console.log

print("HELLO WORLD");

function req(){
// print('sending request...');
const req = new XMLHttpRequest();
const id = document.getElementById('called').value;
const energi = document.getElementById('powerLvl').value;
const name = document.getElementById('named').value;
const message = document.getElementById('message');
// print(typeof(id));
// print(id+'-'+energi+'-'+name);
req.open("PUT",`http://localhost:8080/Create/update/${id+'-'+energi+'-'+name}`,true);
req.send();
message.textContent = "Please reload the page to observe changes!";
req.onload = () => {
    print(req.response.body)
}
}