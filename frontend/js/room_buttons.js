const floor0 = ["01", "02", "018", "019", "04", "03", "14", "13"];
const floor1 = ["107", "101", "122", "120"];
const floor2 = ["210", "217", "222", "200", "229"];
const floor3 = ["302", "303", "304", "305", "306", "307", "308", "309", "310", "311", "313", "314", "326", "325", "323", "321", "320"];
const floor4 = ["401", "403 ", "404", "405"];
const floor5 = ["501", "514", "526", "500"];

buttons0 = [];
buttons1 = [];
buttons2 = [];
buttons3 = [];
buttons4 = [];
buttons5 = [];

function createButtons(floorNumber, roomsNumber) {
    for (let i = 0; i < roomsNumber; i++) {
        let btn = document.createElement("button");
        if (floorNumber == 0) {
            btn.innerHTML = floor0[i];
            btn.id = floor0[i];
            btn.className = "reserve_button";
            buttons0[i] = btn;
        } else if (floorNumber == 1) {
            btn.innerHTML = floor1[i];
            btn.id = floor1[i];
            btn.className = "reserve_button";
            buttons1[i] = btn;
        } else if (floorNumber == 2) {
            btn.innerHTML = floor2[i];
            btn.id = floor2[i];
            btn.className = "reserve_button";
            buttons2[i] = btn;
        } else if (floorNumber == 3) {
            btn.innerHTML = floor3[i];
            btn.id = floor3[i];
            btn.className = "reserve_button";
            buttons3[i] = btn;
        } else if (floorNumber == 4) {
            btn.innerHTML = floor4[i];
            btn.id = floor4[i];
            btn.className = "reserve_button";
            buttons4[i] = btn;
        } else if (floorNumber == 5) {
            btn.innerHTML = floor5[i];
            btn.id = floor5[i];
            btn.className = "reserve_button";
            buttons5[i] = btn;
        }
    }
}

function hideButtons(lastSelectedFloor) {
    const list1 = document.getElementById("first-row");
    let idx = 0;
    while (list1.hasChildNodes()) {
        switch (lastSelectedFloor) {
            case 0:
                floor0[idx] = list1.firstChild;
                idx++;
            case 1:
                floor1[idx] = list1.firstChild;
                idx++;
            case 2:
                floor2[idx] = list1.firstChild;
                idx++;
            case 3:
                floor3[idx] = list1.firstChild;
                idx++;
            case 4:
                floor4[idx] = list1.firstChild;
                idx++;
            case 5:
                floor5[idx] = list1.firstChild;
                idx++;
        }
        list1.removeChild(list1.firstChild);
    }

    const list2 = document.getElementById("second-row");
    while (list2.hasChildNodes()) {
        switch (lastSelectedFloor) {
            case 0:
                floor0[idx] = list2.firstChild;
                idx++;
            case 1:
                floor1[idx] = list2.firstChild;
                idx++;
            case 2:
                floor2[idx] = list2.firstChild;
                idx++;
            case 3:
                floor3[idx] = list2.firstChild;
                idx++;
            case 4:
                floor4[idx] = list2.firstChild;
                idx++;
            case 5:
                floor5[idx] = list2.firstChild;
                idx++;
        }
        list2.removeChild(list2.firstChild);
    }
}

lastSelectedFloor = -1;
let lastClickedBtn = document.createElement("button");
const inputField = document.getElementById("room");


function click(list1, list2, size1, size2) {


    for (let i = 0; i < size1; i++) {
        list1.children[i].addEventListener("click", () => {
            lastClickedBtn.className = "reserve_button";
            lastClickedBtn = list1.children[i];
            list1.children[i].className = "clicked-button";
            inputField.value = list1.children[i].innerText;
        });
    }

    for (let i = 0; i < size2; i++) {
        list2.children[i].addEventListener("click", () => {
            lastClickedBtn.className = "reserve_button";
            lastClickedBtn = list2.children[i];
            list2.children[i].className = "clicked-button";
            inputField.value = list2.children[i].innerText;
        });
    }
}

function showButtons(floor, middle) {
    hideButtons(lastSelectedFloor);

    var body1 = document.getElementById("first-row");
    var body2 = document.getElementById("second-row");

    if (floor == 0) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";

        for (let i = 0; i < buttons0.length; i++) {
            if (i < middle) body1.appendChild(buttons0[i]);
            if (i >= middle) body2.appendChild(buttons0[i]);
        }
        lastSelectedFloor = 0;
        click(body1, body2, 4, 4);
    } else if (floor == 1) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";


        for (let i = 0; i < buttons1.length; i++) {
            if (i < middle) body1.appendChild(buttons1[i]);
            if (i >= middle) body2.appendChild(buttons1[i]);
        }
        lastSelectedFloor = 1;
        click(body1, body2, 1, 3);
    } else if (floor == 2) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";


        for (let i = 0; i < buttons2.length; i++) {
            if (i < middle) body1.appendChild(buttons2[i]);
            if (i >= middle) body2.appendChild(buttons2[i]);
        }
        lastSelectedFloor = 2;
        click(body1, body2, 3, 2);
    } else if (floor == 3) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";


        for (let i = 0; i < buttons3.length; i++) {
            if (i < middle) body1.appendChild(buttons3[i]);
            if (i >= middle) body2.appendChild(buttons3[i]);
        }
        lastSelectedFloor = 3;
        click(body1, body2, 12, 5);

    } else if (floor == 4) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";


        for (let i = 0; i < buttons4.length; i++) {
            if (i < middle) body1.appendChild(buttons4[i]);
            if (i >= middle) body2.appendChild(buttons4[i]);
        }
        lastSelectedFloor = 4;
        click(body1, body2, 4, 0);

    } else if (floor == 5) {
        lastClickedBtn.className = "reserve_button";
        inputField.value = "";


        for (let i = 0; i < buttons5.length; i++) {
            if (i < middle) body1.appendChild(buttons5[i]);
            if (i >= middle) body2.appendChild(buttons5[i]);
        }
        lastSelectedFloor = 5;
        click(body1, body2, 4, 0);
    }
}

createButtons(0, floor0.length);
createButtons(1, floor1.length);
createButtons(2, floor2.length);
createButtons(3, floor3.length);
createButtons(4, floor4.length);
createButtons(5, floor5.length);