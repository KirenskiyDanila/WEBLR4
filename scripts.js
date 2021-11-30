
function ticket_load(id) {
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        const tickets = JSON.parse(this.responseText);
        for (let i = 0; i < tickets.length; i++) {
            document.getElementById("content").innerHTML += tickets[i];
        }
        ticket_check();
    }
    Req.open("get", "load_script.php?id=" + id, true);
    Req.send();
}

function ticket_check() {
    const id = findLastId();
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        const tickets = JSON.parse(this.responseText);
        if (tickets === 0) {
            document.getElementById("load_button").style.display = "none";
        }
    }
    Req.open("get", "ticket_check_script.php?id=" + id, true);
    Req.send();
}

function findLastId() {
    let parentDIV = document.getElementById("content");
    let idArray = [];
    for (let i = 0; i < parentDIV.children.length; i++) {
        idArray.push(parentDIV.children[i]['id']);
    }
    return Math.max.apply(null, idArray) + 1;

}
function registration() {
    let res = true;
    let registerForm = new FormData(document.getElementById('registration-form'));
    fetch('/WEBLR4/register.php', {
            method: 'POST',
            body: registerForm
        }
    )
        .then(response => response.json())
        .then((result) => {
            if (result.errors) {
                document.getElementById('regUL').innerText = "";
                for (let i = 0; i < result.errors.length; i++) {
                    let li = document.createElement("li");
                    li.innerText = result.errors[i];
                    document.getElementById('regUL').appendChild(li);
                }
            }
            else {
                window.location.href = '#';
                location.reload();
            }
        })
        .catch(error => console.log(error));
}

function authorization() {
    let registerForm = new FormData(document.getElementById('authorization-form'));
    fetch('/WEBLR4/authorization.php', {
            method: 'POST',
            body: registerForm
        }
    )
        .then(response => response.json())
        .then((result) => {
            console.log(result.errors);
            if (result.errors) {
                document.getElementById('logUL').innerText = "";
                for (let i = 0; i < result.errors.length; i++) {
                    let li = document.createElement("li");
                    li.innerText = result.errors[i];
                    document.getElementById('logUL').appendChild(li);
                }
            }
            else {
                window.location.href = '#';
                location.reload();
            }
        })
        .catch(error => console.log(error));

}

function load_header(){
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        const header = JSON.parse(this.responseText);
        document.getElementById('header').innerHTML += header;
    }
    Req.open("get", "session_check.php", true);
    Req.send();
}
function end_session(){
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        location.reload();
    }
    Req.open("get", "end_session.php", true);
    Req.send();
}
