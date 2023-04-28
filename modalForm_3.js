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
const moptionDoors1  =   '<option selected value="0" disabled>Choose an option</option><option value="2 doors">2 doors</option><option value="4 doors">4 doors</option>';
const moptionDoors2  =   '<option selected value="0" disabled>Choose an option</option><option value="2 doors regular cab">2 doors regular cab</option><option value="2 doors extended cab">2 doors extended cab</option><option value="4 doors crew cab">4 doors crew cab</option><option value="4 doors extended crew cab">4 doors extended crew cab</option>';

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
        else
            document.getElementById('mgoBackBtn').classList.add('hidden');

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
        document.getElementById('mform_contact').submit();
    }
    else
        return;
}
function mback_step() {
    if(mstep != 2)
        return;
    if(misRockChip) 
        document.getElementById('mgoBackBtn').classList.remove('hidden');
    mButtons[1].classList.add('hidden');
    msteps[1].classList.add('hidden');
    mButtons[0].classList.remove('hidden');
    msteps[0].classList.remove('hidden');
    mstep--;
}

function mdetectService(e) {
    const value     =   e.value;
    if(misRockChip && value != "Rock Chip Repairs") {
        mback_step();
        misRockChip = false;
    }
    else {
        if(value == "Door Glass Replacement" || value == "Back Glass Replacement" || value == "Vent Glass Replacement") {
            maddClass(mcontainerService, mclassInputLeft);
            mcontainerDescripcion.classList.remove('hidden');
            mshowDescrip = true;
        }
        else {
            if(value == "Rock Chip Repairs") {
                misRockChip = true;
                mnext_step(1);
            }
            if(mshowDescrip) {
                mremoveClass(mcontainerService, mclassInputLeft);
                mcontainerDescripcion.classList.add('hidden');
                mshowDescrip = false;
            }
        }
    }
}

function mdetectYear(e) {
    var value     =   e.value;
    value = value.replace(/[^\d,]/g,''); // remove any char
    if(value >= 2010) {
        maddClass(mcontainerYear, mclassInputLeft);
        mcontainerVin.classList.remove('hidden');
        mshowVin = true;
    }
    if(value < 2010) {
        if(mshowVin) {
            mremoveClass(mcontainerYear, mclassInputLeft);
            mcontainerVin.classList.add('hidden');
            mshowVin = false;
        }
    }
}

function mdetectDoors(e) {
    const value     =   e.value;
    if(value == "Sedan" || value == "Wagon" || value == "Hatchaback" || value == "Pick Up") {
        maddClass(mcontainerStyle, mclassInputLeft);
        mcontainerDoor.classList.remove('hidden');
        if(value != "Pick Up")
            minput1[5].innerHTML   =   moptionDoors1;
        else 
            minput1[5].innerHTML   =   moptionDoors2;
        mshowDoors = true;
    }
    else {
        if(mshowDoors) {
            mremoveClass(mcontainerStyle, mclassInputLeft);
            mcontainerDoor.classList.add('hidden');
            mshowDoors = false;
        }
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