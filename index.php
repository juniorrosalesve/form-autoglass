<?php
    $client_ip  =   $_SERVER['REMOTE_ADDR'];
    echo $client_ip;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-AUTOGLASS</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/extra.css">
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/app-4fb946ac.css">

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="px-6 py-6 lg:px-8">

        <div class="relative w-full mx-auto flex justify-center items-center">
            <div class="relative p-5 w-[100%]">
                <?php if($client_ip != '127.0.1.1') { ?>
                    <center>
                    <img src="./logo.png" alt="logo">
                    </center>
                    <p class="text-center text-xs text-slate-800 font-normal" id="input_span_respondtime">We aim to respond in less than 24 hours, (during our regular business days). Please provide us with all the required information.</p>
                <?php } ?>
                <div class="mt-8">
                    <!-- https://app.eautoglassmobile.com/new-request -->
                    <form action="https://app.eautoglassmobile.com/new-request" method="POST" enctype="multipart/form-data" id="mform_contact">
                        <div id="mform_step_1"> 
                            <div class="mb-8">
                                <div class="relative w-[100%] mb-2" data-aos="fade-right">
                                    <select name="language" onchange="mdetectLanguage(this)" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"> 
                                        <option value="en">English</option>
                                        <option value="es">Spanish</option>
                                    </select>
                                    <label id="input_span_lang" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        Preferred language *
                                    </label>
                                </div>
                                <div class="relative w-[100%]" id="mform_container_service" data-aos="fade-right">
                                    <select name="service" id="mservice" onchange="mdetectService(this)" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option selected value="0" id="input_span_choose1" disabled>Choose an option</option>
                                        <!-- <option value="Windshield Replacement">Windshield Replacement</option> -->
                                        <option value="Windshield Replacement">Windshield Replacement</option>
                                        <option value="Door Glass Replacement">Door Glass Replacement</option>
                                        <option value="Back Glass Replacement">Back Glass Replacement</option>
                                        <option value="Quarter Glass Replacement">Quarter Glass Replacement</option>
                                        <option value="Vent Glass Replacement">Vent Glass Replacement</option>
                                        <option value="Sunroof Replacement">Sunroof Replacement</option>
                                        <option value="Rock Chip Repairs">Rock Chip Repairs</option>
                                        <option value="Fleet Maintenance Services">Fleet Maintenance Services</option>
                                    </select>
                                    <label id="input_span_service" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        SERVICE *
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2 hidden" id="mform_container_descripcion" data-aos="fade-right">
                                    <input type="text" name="serviceDescripcion" id="mdescripcion" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_description" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        WHICH GLASSES ARE BROKEN? *
                                    </label>
                                </div>
                            </div>
                                                           
                            <div id="mform_container_year_vin">
                                <div class="relative w-[100%]" data-aos="fade-right" id="mform_container_year">
                                    <input type="number" name="year" id="myear" onkeyup="mdetectYear(this)" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                                    <label id="input_span_year" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        YEAR*
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2 hidden" data-aos="fade-right" id="mform_container_vin">
                                    <input type="text" name="vin" id="mvin" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_vin" class="absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        VIN (optional) <label for="vin_photo" class="text-primary underline">You can also take a photo</label>
                                    </label>
                                    <input type="file" name="vin_photo" id="vin_photo" accept="image/*" capture="user" class="hidden" />
                                </div>
                            </div>
                            <div>
                                <div class="relative w-[100%] mr-2 mt-2" data-aos="fade-right">
                                    <input type="text" name="mark" id="mmarca" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_make" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        MAKE *
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2" data-aos="fade-right">
                                    <input type="text" name="model" id="mmodelo" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_model" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        MODEL *
                                    </label>
                                </div>
                            </div>
                            <div id="mform_container_style_door" class="mt-2">
                                <div class="relative w-[100%]" data-aos="fade-right" id="mform_container_style">
                                    <select name="typeVehicle" id="mvehicle_style" onchange="mdetectDoors(this)" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option selected id="input_span_choose2" disabled>Choose an option</option>
                                        <!-- <option value="Van / MiniVan">Van / MiniVan</option> -->
                                        <option value="Sedan">Sedan</option>
                                        <option value="Wagon">Wagon</option>
                                        <option value="Hatchaback">Hatchaback</option>
                                        <option value="Van / MiniVan">Van / MiniVan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Coupe">Coupe</option>
                                        <option value="Pick Up">Pick Up</option>
                                    </select>
                                    <label id="input_span_typeVehicle" for="3" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        BODY STYLE *
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2 hidden" data-aos="fade-right" id="mform_container_vehicle_door">
                                    <select name="doorVehicle" id="mvehicle_door" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <!-- form.js -->
                                    </select>
                                    <label for="3" id="input_span_doors" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        DOOR *
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="mform_step_2" class="hidden">
                            <div>
                                <div class="relative w-[100%] mr-2" data-aos="fade-right">
                                    <input type="text" name="name" id="mname" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_name" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        FULL NAME*
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2" data-aos="fade-right">
                                    <input type="text" name="email" id="memail" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_email" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        EMAIL*
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="relative w-[100%] mr-2 mt-2" data-aos="fade-right">
                                    <input type="text" name="phone" id="mphone" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_phone" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        PHONE *
                                    </label>
                                </div>
                                <div class="relative w-[100%] mt-2" data-aos="fade-right">
                                    <input type="text" name="zip" id="mzip" class="block px-2.5 pb-5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                    <label id="input_span_zip" class="uppercase absolute text-sm font-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-0 top-0 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-0 peer-placeholder-shown:top-0 peer-focus:top-0 peer-focus:-translate-y-0 left-0">
                                        ZIP *
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h1 id="input_span_located" class="text-center text-lg text-sky-500 font-bold mt-4">We are located in Utah</h1>
                        <div class="relative flex justify-center items-center my-2" id="mbtn_step_1" data-aos="fade-up">
                            <button type="button" onclick="mnext_step(1)">
                                <a id="input_span_next" class="inline-block px-5 py-2 mt-4 text-xl font-bold bg-gradient-to-r from-sky-500 via-sky-500 to-blue-300 text-white rounded-full">
                                    Next
                                </a>
                            </button>
                        </div>
                        <div class="relative flex justify-center items-center my-2 hidden" id="mbtn_step_2" data-aos="fade-up">
                            <span class="mdi mdi-arrow-left text-2xl -mb-4 mr-3 cursor-pointer text-gray-400" id="mgoBackBtn" onclick="mback_step()"></span>
                            <button type="button" onclick="mnext_step(2)">
                                <a id="input_span_send" class="inline-block px-5 py-2 mt-4 text-xl font-bold bg-gradient-to-r from-sky-500 via-sky-500 to-blue-300 text-white rounded-full">
                                    Send
                                </a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <script src="./modalForm_7.js"></script>
    <script>
        const vinPhoto  =   document.getElementById("vin_photo");
        const vinInput  =   document.getElementById("mvin");
        let isVinPhoto  =   false;
        vinPhoto.onchange = evt => {
            const [file] = vinPhoto.files
            if (file) {
                console.log(file);
                vinInput.value = file.name;
                isVinPhoto = true;
            }
        }
        vinInput.onfocus = env => {
            if(isVinPhoto) {
                vinInput.value = null;
                vinPhoto.value = null;
                isVinPhoto = false;
            }
        }
    </script>
</body>
</html>