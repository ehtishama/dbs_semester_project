<?php
    $user = $_SESSION['user'];
    require_once("views/libs/header.php");
?>

<div class="container mx-auto antialiased">
    <div class="flex">
        <?php require_once("views/templates/profile_sidebar.php");  ?>
        <div class="bg-white shadow rounded p-4 pl-8 my-2 w-full">
            
            <div class="flex mb-8">
                <img src="views/assets/profile.jpg" class="w-48 h-48 bg-gray border-4 border-white shadow-xl mr-3">
                <div class="self-end">
                    <p class="text-2xl font-bold">
                        <?php 
                        echo $user['first_name'] .
                        " " .
                        $user['last_name'] 
                        ?>
                    </p>
                    <p class="text-gray-700">
                        @<?php echo $user['username'] ?>
                    </p>
                </div>
            </div>

            <p class="text-gray-400 mb-4 font-bold">Contact Information</p>
            <div class="flex text-gray-700 mb-8 tracking-tight text-base">
                <ul class="mr-8">
                    <li class="pb-4 font-bold">First Name:</li>
                    <li class="pb-4 font-bold">Last Name:</li>
                    <li class="pb-4 font-bold">E-mail:</li>
                </ul>

                <ul id="profile_info">
                    <li class="pb-4 font-medium"><?php echo $user['first_name'] ?></li>
                    <li class="pb-4 font-medium"><?php echo $user['last_name'] ?></li>
                    <li class="pb-4 font-medium text-blue-600"><?php echo $user['email'] ?></li>
                </ul>

                <ul class="hidden" id="edit_profile_form">
                    <input class="pb-2 font-medium border-blue-400 mb-1" value="<?php echo $user['first_name'] ?>" name="firstname">
                    <input class="pb-2 font-medium border-blue-400 mb-1" value="<?php echo $user['last_name'] ?>" name="lastname">
                    <input class="pb-2 font-medium border-blue-400" value="<?php echo $user['email'] ?>" name="email">
                </ul>

            </div>

            <div>
                <button class="inline-block rounded shadow-xl bg-blue-500 text-white font-bold px-4 py-2"
                id="edit_profile_button" 
                >
                    Edit Profile
                </button>
                <button class="inline-block rounded shadow-xl bg-green-500 text-white font-bold px-4 py-2 hidden"
                id="update_profile_button" 
                data-action="open-modal" data-target="update_profile_modal"
                >
                    Update Profile
                </button>
                

                <a href="" class="hidden ml-2 text-blue-400" id="profile_update_cancel"> Cancel </a>
            </div>
        
        </div>
    </div>
</div>

<!-- modal, initially hidden, it is displayed by button with data-target = "modalId"  -->

<!-- <button
data-action="open-modal"
data-target="modal"
>
    Example Button
</button> -->

<div class="modal"
id="update_profile_modal">
    <div  class="border p-8 m-2 bg-white rounded-lg shadow w-1/3 mx-auto" id="modal-body">
        <div class="text-center">
            <svg class="loading h-16 w-16 inline-block p-4" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                <g fill="none" fill-rule="evenodd" stroke="gray">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform
                                attributeName="transform"
                                type="rotate"
                                from="0 18 18"
                                to="360 18 18"
                                dur="1s"
                                repeatCount="indefinite"/>
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <button class="bg-green-500 text-white font-bold px-4 rounded shadow text-sm mx-auto hidden"
                        data-action="close-modal"
                        data-target="modal"
                        >
            Ok
        </button>
    </div>
</div>


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    (function(){
        let m_ = (id) => document.getElementById(id);

        let edit_profile_button = m_("edit_profile_button");
        let edit_profile_form = m_("edit_profile_form");
        let profile_info = m_("profile_info");
        let profile_update_cancel = m_("profile_update_cancel");
        let profile_form = m_("edit_profile_form");
        let update_profile_button = m_("update_profile_button");
        let update_button = false;
        
        function getProfileData(){
            let firstname = edit_profile_form.querySelector('[name="firstname"').value;
            let lastname = edit_profile_form.querySelector('[name="lastname"').value;
            let email = edit_profile_form.querySelector('[name="email"').value;
            let data = new FormData()
            data.append("firstname", firstname)
            data.append("lastname", lastname)
            data.append("email", email)
            return data;
        }
        update_profile_button.onclick = function(){
            let profileData = getProfileData();
            let modal = m_(this.dataset.target);
            // make an ajax request to update profile
            
            axios.post(APPROOT + "/profile/update_profile", profileData)
            .then(function (response) {
                response = response.data
                if(response.status == "success")
                {
                    modal.querySelector("#modal-body").innerHTML = 
                    `<p class="text-gray-700 text-center"> ${response.msg} </p>`;

                }
                else alert(data.msg)
            })
            .catch(function (error) {
                console.log(error);
            });
        }    
        edit_profile_button.onclick = function () {
            profile_info.classList.add("hidden")
            this.classList.add("hidden");

            edit_profile_form.classList.remove("hidden");
            update_profile_button.classList.remove("hidden");  
            profile_update_cancel.classList.remove("hidden")  ;

        }
        profile_update_cancel.onclick = function(e){
            e.preventDefault();
            edit_profile_button.classList.remove("hidden")
            profile_info.classList.remove("hidden")


            update_profile_button.classList.add("hidden")
            profile_update_cancel.classList.add("hidden")
            edit_profile_form.classList.add("hidden")
        }
    })()
</script>

<?php
    require_once("views/libs/footer.php");
?>
