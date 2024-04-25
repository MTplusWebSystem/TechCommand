function On(element, func) {
    element.addEventListener("click", func);
}

let data_db = [];
let data_page = [];
const start_db = document.getElementById("view-db");
const create_db = document.getElementById("Create-DB");
const Config_view = document.getElementById("Config-view");
const Config_page = document.getElementById("Config-page"); // Corrected variable name
const card1 = document.getElementById("card-1");
const card2 = document.getElementById("card-2");
const card3 = document.getElementById("card-3");
document.addEventListener("DOMContentLoaded", () => {

    if (start_db && create_db) {
        On(start_db, toggleViewDB);
        On(create_db, collectDBData);
        On(Config_view, () => {
            const view_page = document.querySelector(".config-page");
            view_page.style.display = "flex";
        });
        On(Config_page, collectPAGEData);
    }
});


function toggleViewDB() {
    const view = document.querySelector(".view-db");
    if (view) {
        const computedStyle = window.getComputedStyle(view);
        const displayStyle = computedStyle.getPropertyValue("display");
        
        if (displayStyle === "none") {
            view.style.display = "flex"; 
        } else {
            view.style.display = "none"; 
        }
    }
}

function PostData(url,dados){ 
    const dadosJSON = JSON.stringify(dados);
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: dadosJSON
    };
    fetch(url, options)
    .then(response => {
        if (!response.ok) {
            throw new Error('Ocorreu um erro ao enviar os dados.');
        }
        return response.json(); 
    })
    .then(data => {
        if(data['success'] === true){
            window.location.href = '/';
        }
    })
    .catch(error => console.error('Erro:', error));
}

function collectDBData() {
    const dbUser = document.getElementById("DB-User").value;
    const dbPass = document.getElementById("DB-Pass").value;
    const dbName = document.getElementById("DB-Name").value;
    const dbHost = document.getElementById("DB-Host").value;

    data_db = [ dbUser, dbPass, dbName, dbHost ];

    toggleViewDB();
    start_db.style.backgroundColor = "#1239bc";
    start_db.style.color = "#42d783";
    card1.style.borderColor = "#ffffff";
    card2.style.borderColor = "#42d783";
    start_db.textContent = "Concluido!";
    window.location.hash = "#card-2";
    const view_block = document.getElementsByClassName("block-view")[0];
    view_block.style.display = "none";
}

function collectPAGEData() {
    const User = document.getElementById("User").value;
    const Pass = document.getElementById("Pass").value;
    const Title = document.getElementById("title").value;
    const requestData = { "username": User, "password":Pass, "title":Title}; 
    const url = "../../controllers/receive-data/create-db.php?create=true";
    const url1 = "../../controllers/receive-data/create-db.php?jsoninfo=true";
    PostData(url, data_db); 
    PostData(url1, requestData);
}
