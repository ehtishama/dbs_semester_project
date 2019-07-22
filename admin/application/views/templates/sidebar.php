<aside class="bg-white w-1/4 min-h-screen flex flex-col text-white px-3 ml-2 border shadow">
    <div class="scroll_wrapper h-full">
        <ul class="scroll-y">

            <!-- sidebar links -->
            <?php foreach ($sidebar_links as $link): ?>

            <li class="font-thin text-gray-800 p-3 hover:text-purple-500 hover:font-bold text-sm">
                <a href="<?php echo base_url() . $link["link"]; ?>" class="flex">
                    <span class="pr-4">

                        <?php $this -> load -> view($link['icon']); ?>

                    </span>
                    <span class="self-center"><?php echo $link["title"] ?> </span>
                </a>

                <!-- if it has sublinks -->
                <?php if(isset($link['sublinks'])): ?>
                <ul class="text-gray-900 px-3">

                    <?php foreach($link['sublinks'] as $sublink) :?>
                    <li class="font-thin bg-gray-400 mt-2 shadow text-sm block hover:bg-gray-800 hover:text-white">
                            <a href="<?php echo base_url() . $sublink['link']?>" class="p-2 block">
                                <?php echo $sublink['title']; ?>
                            </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
                <?php endif; ?>
            </li>

            <?php endforeach;?>
            
        </ul>
        <div class="p-2 font-bold hover:text-purple-500 mt-4 text-center">

            <a href="#" class="text-gray-500 flex">
            <svg role="img" 
                xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24" aria-labelledby="exitIconTitle" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000">
                <title id="exitIconTitle">Exit</title>
                <path d="M18 15l3-3-3-3"/>
                <path d="M11.5 12H20"/>
                <path stroke-linecap="round" d="M21 12h-1"/>
                <path d="M15 4v16H4V4z"/>
            </svg>
                <span class="ml-2 text-black self-center text-lg">Logout</span>	
            </a>
        </div>
    </div>
</aside>