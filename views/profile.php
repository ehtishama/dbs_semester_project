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
                    <input class="pb-2 font-medium border-blue-400 mb-1" value="<?php echo $user['first_name'] ?>">
                    <input class="pb-2 font-medium border-blue-400 mb-1" value="<?php echo $user['last_name'] ?>">
                    <input class="pb-2 font-medium border-blue-400" value="<?php echo $user['email'] ?>">
                </ul>

            </div>

            <div>
                <button class="inline-block rounded shadow-xl bg-blue-500 text-white font-bold px-4 py-2"
                id="edit_profile_button" 
                >
                    Edit Profile
                </button>
                <a href="" class="hidden ml-2 text-blue-400" id="profile_update_cancel"> Cancel </a>
            </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">
    (function(){
        let m_ = (id) => document.getElementById(id);
        let edit_profile_button = m_("edit_profile_button");
        let edit_profile_form = m_("edit_profile_form");
        let profile_info = m_("profile_info");
        let profile_update_cancel = m_("profile_update_cancel");
    
        let update_button = false;
    
        edit_profile_button.onclick = function () {
            if(!update_button)
            {
                profile_info.style.display = "none";
                edit_profile_form.style.display = "block";
                profile_update_cancel.style.display = "inline-block";
                edit_profile_button.innerText = "Update Profile";
                update_button = true;
            }else alert("Updating");
            
        }
        profile_update_cancel.onclick = function(e){
            e.preventDefault();
            profile_info.style.display = "block";
            edit_profile_form.style.display = "none";
            profile_update_cancel.style.display = "none";
            edit_profile_button.innerText = "Edit Profile";
            update_button = false;
        }
    })()
</script>

<?php
    require_once("views/libs/footer.php");
?>
