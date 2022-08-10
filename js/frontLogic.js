/**
 * This file manages the front end behaviour
 */


//******************SELECTORS******************
const saveButton = document.querySelector("#saveButton");

const sku = document.querySelector("input#sku");
const namePrd = document.querySelector("#name");
const price = document.querySelector("#price");

const productForm = document.querySelector("#product_form");
const attributeSelector = document.querySelector("#productType");
const boxAttributeDisc = document.querySelector(".special-attribute.disc");
const discSize = document.querySelector(".special-attribute.disc input");
const boxAttributeFurniture = document.querySelector(".special-attribute.furniture");
const dimHeight = document.querySelector(".special-attribute.furniture #height");
const dimWidth = document.querySelector(".special-attribute.furniture #width");
const dimLength = document.querySelector(".special-attribute.furniture #length");
const boxAttributeBook = document.querySelector(".special-attribute.book");
const dimBook = document.querySelector(".special-attribute.book #weight");

const notification = document.querySelector(".notificationBox");

const tl = gsap.timeline({defaults: {duration: 0.1}});


//******************INITIALIZATIONS******************
var active = null;
if (boxAttributeDisc !== null) {
    boxAttributeDisc.classList.add("hide");
}
if (boxAttributeFurniture !== null) {
    boxAttributeFurniture.classList.add("hide");
}
if (boxAttributeBook !== null) {
    boxAttributeBook.classList.add("hide");
}
var discardedBoxes = [];


//******************EVENT LISTENERS******************
if (sku !== null) {
    sku.addEventListener("blur", deleteSpaces.bind(null, sku));
    namePrd.addEventListener("blur", deleteSpaces.bind(null, namePrd));
    price.addEventListener("blur", commaDecimalsCorrection.bind(null, price));
    attributeSelector.addEventListener("click", detectCategory);

    sku.addEventListener("focus", deleteNotification.bind(null, sku));
    namePrd.addEventListener("focus", deleteNotification.bind(null, namePrd));
    price.addEventListener("focus", deleteNotification.bind(null, price));
    attributeSelector.addEventListener("click", deleteNotification.bind(null, attributeSelector));
    discSize.addEventListener("focus", deleteNotification.bind(null, discSize));
    dimHeight.addEventListener("focus", deleteNotification.bind(null, dimHeight));
    dimWidth.addEventListener("focus", deleteNotification.bind(null, dimWidth));
    dimLength.addEventListener("focus", deleteNotification.bind(null, dimLength));
    dimBook.addEventListener("focus", deleteNotification.bind(null, dimBook));

    saveButton.addEventListener("click", checkSave);
}


//******************FUNCTIONS******************
function deleteSpaces(field)
{
    fieldVal = field.value;
    fieldVal = fieldVal.trim();
    field.value = fieldVal;
}

function commaDecimalsCorrection(numericField)
{
    let numVal = numericField.value;

    numVal = numVal.trim();
    numVal = numVal.replace(",", ".");

    if (Number(numVal)) {
        var iS = numVal.indexOf(".");
        
        if (iS !== -1) {
            numVal1 = numVal.substring(0, iS + 1);
            numVal2 = numVal.substring(iS + 1);
            numVal2 = numVal2.substr(0, 2);
    
            numVal = numVal1.concat(numVal2);
        }
        numericField.value = numVal;
    }
}

function detectCategory(e)
{
    switch (e.target.value) {
        case "voidCategory":
            boxAttributeDisc.classList.add("hide");
            boxAttributeFurniture.classList.add("hide");
            boxAttributeBook.classList.add("hide");
            break;
        case "dvd":
            boxAttributeDisc.classList.remove("hide");
            boxAttributeFurniture.classList.add("hide");
            boxAttributeBook.classList.add("hide");
            discSize.addEventListener("blur", commaDecimalsCorrection.bind(null, discSize));
            discardedBoxes = [boxAttributeFurniture, boxAttributeBook];
            break;
        case "book":
            boxAttributeDisc.classList.add("hide");
            boxAttributeFurniture.classList.add("hide");
            boxAttributeBook.classList.remove("hide");
            dimBook.addEventListener("blur", commaDecimalsCorrection.bind(null, dimBook));
            discardedBoxes = [boxAttributeDisc, boxAttributeFurniture];
            break;
        case "furniture":
            boxAttributeDisc.classList.add("hide");
            boxAttributeFurniture.classList.remove("hide");
            boxAttributeBook.classList.add("hide");
            dimHeight.addEventListener("blur", commaDecimalsCorrection.bind(null, dimHeight));
            dimWidth.addEventListener("blur", commaDecimalsCorrection.bind(null, dimWidth));
            dimLength.addEventListener("blur", commaDecimalsCorrection.bind(null, dimLength));
            discardedBoxes = [boxAttributeDisc, boxAttributeBook];
            break;
    }
}

function checkSave(e)
{
    let boss = null;

    let boss1 = checkVoidValues(e);
    console.log(boss1);

    let boss2 = checkVoidCategory(e);
    console.log(boss2);

    let boss3 = checkVoidAttributes(e);
    console.log(boss3);

    let boss4 = checkCorrectValue(e);
    console.log(boss4);

    boss = boss1 && boss2 && boss3 && boss4;

    console.log("BOSS: " + boss);

    if (boss) {
        boxTerminator(discardedBoxes);
    }
}

function checkVoidValues(e)
{
    const commonInputs = document.querySelectorAll(".common-info div input");
    var boss = null;
    
    for (input of commonInputs) {
        if (input.value == "") {
            let notificationContainer = input.parentElement;

            if (!notificationContainer.childNodes[5]) {
                let type = "voidValue";
                let notificationContainer = input.parentElement;
                let notificationBox = notificationTemplate(type);
                notificationContainer.appendChild(notificationBox);
                tl.from(notificationBox, {opacity:0, x: -40});
            }
            boss = false;

            e.preventDefault();
        } else {
            boss = true;
        }
    }
    return boss;
}

function checkVoidCategory(e)
{
    var boss = null;

    if (attributeSelector.value == "voidCategory") {
        let notificationContainer = attributeSelector.parentElement;

        if (!notificationContainer.childNodes[3]) {
            let notificationContainer = attributeSelector.parentElement;
            let type = "voidCategory";
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        boss = false;
        e.preventDefault(); 
    } else {
        boss = true;
    }
    return boss;
}

function checkVoidAttributes(e)
{
    var attributes = document.querySelectorAll(".special-attribute:not([class*='hide']) input");
    var boss = null;

    for (attribute of attributes) {
        if (attribute.value == "") {
            let notificationContainer = attribute.previousElementSibling;

            if (!notificationContainer.childNodes[1]) {
                let type = "voidValue";
                let notificationContainer = attribute.previousElementSibling;
                let notificationBox = notificationTemplate(type);
                notificationContainer.appendChild(notificationBox);
                tl.from(notificationBox, {opacity:0, x: -40});
            }
            boss = false;
            e.preventDefault();
        } else {
            boss = true;
        }
    }
    return boss;
}

function checkCorrectValue(e)
{
    if (Number(namePrd.value) && namePrd.value !== "") {
        let notificationContainer = namePrd.parentElement;

        if (!notificationContainer.childNodes[5]) {
            let type = "wrongValue";
            let notificationContainer = namePrd.parentElement;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }

    if (!Number(price.value) && price.value !== "") {
        let notificationContainer = price.parentElement;

        console.log(notificationContainer.childNodes);

        if (!notificationContainer.childNodes[5]) {
            let type = "wrongValue";
            let notificationContainer = price.parentElement;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});  
        }
        e.preventDefault();
    }

    if (!Number(discSize.value) && discSize.value !== "") {
        let notificationContainer = discSize.previousElementSibling;

        if (!notificationContainer.childNodes[1]) {
            let type = "wrongValue";
            let notificationContainer = discSize.previousElementSibling;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }
    
    if (!Number(dimHeight.value) && dimHeight.value !== "") {
        let notificationContainer = dimHeight.previousElementSibling;

        if (!notificationContainer.childNodes[1]) {
            let type = "wrongValue";
            let notificationContainer = dimHeight.previousElementSibling;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }

    if (!Number(dimWidth.value) && dimWidth.value !== "") {
        let notificationContainer = dimWidth.previousElementSibling;

        if (!notificationContainer.childNodes[1]) {
            let type = "wrongValue";
            let notificationContainer = dimWidth.previousElementSibling;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }

    if (!Number(dimLength.value) && dimLength.value !== "") {
        let notificationContainer = dimLength.previousElementSibling;

        if (!notificationContainer.childNodes[1]) {
            let type = "wrongValue";
            let notificationContainer = dimLength.previousElementSibling;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }

    if (!Number(dimBook.value) && dimBook.value !== "") {
        let notificationContainer = dimBook.previousElementSibling;

        if (!notificationContainer.childNodes[1]) {
            let type = "wrongValue";
            let notificationContainer = dimBook.previousElementSibling;
            let notificationBox = notificationTemplate(type);
            notificationContainer.appendChild(notificationBox);
            tl.from(notificationBox, {opacity:0, x: -40});
        }
        e.preventDefault();
    }
    return true;
}

function notificationTemplate(typeMess)
{
    let notificationBox = document.createElement("div");

    notificationBox.classList.add("notificationBox");
    if (typeMess == "wrongValue") {
        notificationBox.classList.add("wrongValue");
    }
    notificationBox.innerText = notificationMessage(typeMess);
    return notificationBox;
}

function notificationMessage(type)
{
    switch (type) {
        case "voidValue":
            return "Please, submit required data";
            break;
        case "wrongValue":
            return "Please, provide the data of indicated type";
            break;
        case "voidCategory":
            return "Please, select a category";
            break;
    }
    //should be better to implement an associative array
}

function deleteNotification(input)
{
    if (input.parentElement.classList[0] !== "special-attribute"
        && input.nextElementSibling
    ) {
        let notification = input.nextElementSibling;
        notification.remove();
    }

    if (input.parentElement.classList[0] == "special-attribute"
        && input.previousElementSibling.childNodes[1]
    ) {
        console.log(input.previousElementSibling.childNodes);
        let notificationCont = input.previousElementSibling;
        let notification = notificationCont.childNodes[1];
        notification.remove();
    }
}

function boxTerminator(boxes)
{
    for (box of boxes) {
        box.remove();
    }
}

