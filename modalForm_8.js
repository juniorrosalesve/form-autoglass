/* Inputs */
const minput1  =     [
    document.getElementById('myear'),
    document.getElementById('mvin'),
    document.getElementById('mmarca'), // 2
    document.getElementById('mmodelo'),
    document.getElementById('mvehicle_style'),
    document.getElementById('mvehicle_door'),
    document.getElementById('mservice'),
    document.getElementById('mdescripcion')
];

const minput2    =   [
    document.getElementById('mname'),
    document.getElementById('memail'),
    document.getElementById('mphone'), // 2
    document.getElementById('mzip')
];

/* Containers form */
const msteps     =   [
    document.getElementById('mform_step_1'),
    document.getElementById('mform_step_2')
];
const mcontainerYear_VIN     =   document.getElementById('mform_container_year_vin');
const mcontainerYear         =   document.getElementById('mform_container_year');
const mcontainerVin          =   document.getElementById('mform_container_vin');
const mcontainerStyleDoor    =   document.getElementById('mform_container_style_door');
const mcontainerStyle        =   document.getElementById('mform_container_style');
const mcontainerDoor         =   document.getElementById('mform_container_vehicle_door');

const mcontainerService      =   document.getElementById('mform_container_service');
const mcontainerDescripcion  =   document.getElementById('mform_container_descripcion');

/* Inputs Class */
const mclassInputLeft    =   [
    "md:w-10/12",
    "lg:w-6/12",
    "mr-2"
];

/* mButtons Form */
const mButtons   =   [
    document.getElementById('mbtn_step_1'),
    document.getElementById('mbtn_step_2')
];

/* Boolean */
var mshowVin     =   false;
var mshowDoors   =   false;
var mshowDescrip =   false;
var misRockChip  =   false;
var mstep        =   1;

/* Extra */
const moptionDoors1_EN  =   '<option selected value="0" disabled>Choose an option</option><option value="2 doors">2 doors</option><option value="4 doors">4 doors</option>';
const moptionDoors2_EN  =   '<option selected value="0" disabled>Choose an option</option><option value="2 doors regular cab">2 doors regular cab</option><option value="2 doors extended cab">2 doors extended cab</option><option value="4 doors crew cab">4 doors crew cab</option><option value="4 doors extended crew cab">4 doors extended crew cab</option>';

const moptionDoors1_ES  =   '<option selected value="0" disabled>Elige una opción</option><option value="2 doors">2 puertas</option><option value="4 doors">4 puertas</option>';
const moptionDoors2_ES  =   '<option selected value="0" disabled>Elige una opción</option><option value="2 doors regular cab">Cabina regular de 2 puertas</option><option value="2 doors extended cab">Cabina extendida de 2 puertas</option><option value="4 doors crew cab">Cabina doble de 4 puertas</option><option value="4 doors extended crew cab">Cabina extendida de 4 puertas</option>';

const messages  =   {
    "empty":"You must fill in all the fields.",
    "noyear":"You must choose a correct vehicle date.",
    "email":"Please enter a valid email.",
    "phone":"Please enter a valid phone number."
};

var actualSpanLang    =   "en";

window.addEventListener('load', function() {
    //
});

function mnext_step(e) {
    if(e == 1 && mstep == 1) {
        if(!misRockChip) {
            if(mdetectEmptyStep1()) {
                alert(messages.empty);
                return;
            }
            if(minput1[0].value < 1900 || minput1[0].value > 2024) {
                alert(messages.noyear);
                return;
            }
        }

        mButtons[0].classList.add('hidden');
        msteps[0].classList.add('hidden');
        mButtons[1].classList.remove('hidden');
        msteps[1].classList.remove('hidden');

        mstep++;
    }
    else if(e == 2 && mstep == 2) {
        if(!misRockChip) {
            if(mdetectEmptyStep1()) {
                alert(messages.empty);
                return;
            }
            if(minput1[0].value < 1900 || minput1[0].value > 2024) {
                alert(messages.noyear);
                return;
            }
        }
        if(mdetectEmptyStep2()) {
            alert(messages.empty);
            return;
        }
        if(!validateEmail(minput2[1].value)) {
            alert(messages.email);
            return;
        }
        if(!validatePhone(minput2[2].value)) {
            alert(messages.phone);
            return;
        }
        document.getElementById('mform_contact').submit();
    }
    else
        return;
}
function mback_step() {
    if(mstep != 2)
        return;
    if(misRockChip) {
        minput1[6].value = 0;
        misRockChip = false;
    }
    mButtons[1].classList.add('hidden');
    msteps[1].classList.add('hidden');
    mButtons[0].classList.remove('hidden');
    msteps[0].classList.remove('hidden');
    mstep--;
}

function mdetectService(e) {
    const value     =   e.value;
    if(value == "Door Glass Replacement" || value == "Back Glass Replacement" || value == "Vent Glass Replacement") {
        //maddClass(mcontainerService, mclassInputLeft);
        mcontainerDescripcion.classList.remove('hidden');
        mshowDescrip = true;
    }
    else {
        if(value == "Rock Chip Repairs") {
            misRockChip = true;
            mnext_step(1);
        }
        if(mshowDescrip) {
            //mremoveClass(mcontainerService, mclassInputLeft);
            mcontainerDescripcion.classList.add('hidden');
            mshowDescrip = false;
        }
    }
}

function mdetectYear(e) {
    var value     =   e.value;
    value = value.replace(/[^\d,]/g,''); // remove any char
    if(value >= 2010) {
        //maddClass(mcontainerYear, mclassInputLeft);
        mcontainerVin.classList.remove('hidden');
        mshowVin = true;
    }
    if(value < 2010) {
        if(mshowVin) {
            //mremoveClass(mcontainerYear, mclassInputLeft);
            mcontainerVin.classList.add('hidden');
            mshowVin = false;
        }
    }
}

function mdetectDoors(e) {
    const value     =   e.value;
    if(value == "Sedan" || value == "Wagon" || value == "Hatchaback" || value == "Pick Up") {
        //maddClass(mcontainerStyle, mclassInputLeft);
        mcontainerDoor.classList.remove('hidden');
        if(value != "Pick Up") {
            if(actualSpanLang == "en") 
                minput1[5].innerHTML    =   moptionDoors1_EN;
            else
                minput1[5].innerHTML    =   moptionDoors1_ES;
        }
        else {
            if(actualSpanLang == "en") 
                minput1[5].innerHTML   =   moptionDoors2_EN;
            else
                minput1[5].innerHTML   =   moptionDoors2_ES;
        }
        mshowDoors = true;
    }
    else {
        if(mshowDoors) {
            //mremoveClass(mcontainerStyle, mclassInputLeft);
            mcontainerDoor.classList.add('hidden');
            mshowDoors = false;
        }
    }
}

/* CHANGE LANGUAGE FORM */
function mdetectLanguage(e) {
    const value     =   e.value;
    if(value != actualSpanLang) {
        if(value == "en") {
            xspan("respondtime", "We aim to respond in less than 24 hours, (during our regular business days). Please provide us with all the required information.")

            xspan("lang", "Language *");
            xspan("service", "service *");
            xspan("choose1", "Choose an option");
            xspan("description", "WHICH GLASSES ARE BROKEN? *");
            xspan("year", "year *");
            xspan("vin", 'VIN (optional) <label for="vin_photo" class="text-primary underline">You can also take a photo</label>');
            xspan("make", "make *");
            xspan("model", "model *");
            xspan("typeVehicle", "body style *");
            xspan("doors", "doors *");
            xspan("choose2", "Choose an option");

            xspan("name", "full name*");
            xspan("email", "email *");
            xspan("phone", "phone *");
            xspan("zip", "zip *");

            xspan("located", "We are located in Utah");
            xspan("next", "Next");
            xspan("send", "Send");
        }
        else {
            xspan("respondtime", "Nuestro objetivo es responder en menos de 24 horas (durante nuestros días hábiles habituales). Por favor, proporciónenos toda la información requerida.")

            xspan("lang", "idioma *");
            xspan("service", "servicio *");
            xspan("choose1", "Elige una opción");
            xspan("description", "QUÉ VIDRIOS ESTÁN ROTOS? *");
            xspan("year", "Año *");
            xspan("vin", 'VIN (opcional) <label for="vin_photo" class="text-primary underline">También puedes tomar una foto</label>');
            xspan("make", "marca *");
            xspan("model", "modelo *");
            xspan("typeVehicle", "Estilo del vehículo *");
            xspan("doors", "puertas *");
            xspan("choose2", "Elige una opción");
            
            xspan("name", "Nombre *");
            xspan("email", "Correo *");
            xspan("phone", "Teléfono *");
            xspan("zip", "Código postal *");

            xspan("located", "Nosotros estamos ubicados en Utah");
            xspan("next", "Siguiente");
            xspan("send", "Envíar");
        }
        actualSpanLang = value;
    }
}

/* Stocks */
function maddClass(element, clasx) {
    for(var i = 0; i < clasx.length; i++)
        element.classList.add(clasx[i]);
}

function mremoveClass(element, clasx) {
    for(var i = 0; i < clasx.length; i++)
        element.classList.remove(clasx[i]);
}
function mdetectEmptyStep1() {
    let error   =    false;
    for(var i = 0; i < minput1.length; i++) {
        if(i == 1)
            continue;
        if(i == 5 && !mshowDoors)
            continue;
        if(i == 7 && !mshowDescrip)
            continue; 
        const value     =   minput1[i].value;
        if(value == '' || value == undefined || value == 0) {
            error = true;
            break;
        }
    }
    return error;
}
function mdetectEmptyStep2() {
    let error   =    false;
    for(var i = 0; i < minput2.length; i++) {
        const value     =   minput2[i].value;
        if(value == '' || value == undefined || value == 0) {
            error = true;
            break;
        }
    }
    return error;
}

function validatePhone(phone) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if(phone.match(phoneno)) 
        return true;
    else 
        return false;
}

const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

function xspan(name, text) {
    const span  =   document.getElementById("input_span_"+name);
    span.innerHTML  =   text;
}