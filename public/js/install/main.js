class EventController {
    constructor() {
        this.connectDB = document.getElementById("ConnectonDB");
        this.infoPainel = document.getElementById("InfoPainel");
        this.infoDB = [];
        this.PainelInfos =[];
        this.personSelect = "";
    }

    ClickDB() {
        this.connectDB.addEventListener("click", () => {
            this.infoDB = [
                document.getElementById("UserDB").value,
                document.getElementById("PassDB").value,
                document.getElementById("NameDB").value,
                document.getElementById("HostDB").value,
            ];
            const card = document.querySelector(".card-1");
            const card2 = document.querySelector(".card-2");
            card.style.display = "none";
            card2.style.display = "flex";
        });
    }
    Opiton() {
        const op1 = document.getElementById("option-1");
        const op2 = document.getElementById("option-2");
        const op3 = document.getElementById("option-3");
        const op4 = document.getElementById("option-4");

        function handleClick(op) {
            return function() {
                const view = document.querySelector(".op" + op);
                const vector = [
                    [2, 3, 4],
                    [1, 3, 4],
                    [2, 1, 4],
                    [1, 2, 3]
                ];
                vector[op - 1].forEach(element => {
                    const view = document.querySelector(".op" + element);
                    view.style.backgroundColor = "#ffffff";
                });
                view.style.backgroundColor = "#5cfaa9";
                this.personSelect = "assets/illustrations/person-" + op;
                this.PainelInfos= [
                    document.getElementById("User").value,
                    document.getElementById("Pass").value,
                    document.getElementById("Logo").value,
                    this.personSelect
                ];
            };
        }

        op1.addEventListener("click", handleClick(1));
        op2.addEventListener("click", handleClick(2));
        op3.addEventListener("click", handleClick(3));
        op4.addEventListener("click", handleClick(4));

        this.infoPainel.addEventListener("click",()=>{
            const card = document.querySelector(".card-2");
            const card2 = document.querySelector(".card-3");
            card.style.display = "none";
            card2.style.display = "flex";
        })
    }
}

const Controller = new EventController();
Controller.ClickDB();
Controller.Opiton();