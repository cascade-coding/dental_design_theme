<?php
get_header();
?>


<nav class="bg-primary-950 text-neutral-100">
    <div class="mx-auto max-w-7xl px-2 lg:px-6 xl:px-8">
        <div class="relative flex min-h-[90px] items-center justify-between">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- logo -->
            <div class="flex flex-1 items-center justify-center lg:items-end lg:self-end lg:pb-2 lg:justify-start">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-md.png" alt="Site Logo">
                </div>
            </div>

            <!-- menu -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                <div class="hidden sm:ml-6 lg:flex lg:flex-col">

                    <!-- Action button -->
                    <div class="flex justify-end items-center gap-x-4 pt-3">
                        <div class="flex items-center gap-x-2 ">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-neutral-300" fill-rule="evenodd" clip-rule="evenodd" d="M5.05002 4.05C6.36284 2.73718 8.14341 1.99964 10 1.99964C11.8566 1.99964 13.6372 2.73718 14.95 4.05C16.2628 5.36282 17.0004 7.14339 17.0004 9C17.0004 10.8566 16.2628 12.6372 14.95 13.95L10 18.9L5.05002 13.95C4.39993 13.3 3.88425 12.5283 3.53242 11.6789C3.1806 10.8296 2.99951 9.91931 2.99951 9C2.99951 8.08069 3.1806 7.17038 3.53242 6.32105C3.88425 5.47173 4.39993 4.70002 5.05002 4.05ZM10 11C10.5304 11 11.0392 10.7893 11.4142 10.4142C11.7893 10.0391 12 9.53043 12 9C12 8.46957 11.7893 7.96086 11.4142 7.58579C11.0392 7.21071 10.5304 7 10 7C9.46958 7 8.96088 7.21071 8.5858 7.58579C8.21073 7.96086 8.00002 8.46957 8.00002 9C8.00002 9.53043 8.21073 10.0391 8.5858 10.4142C8.96088 10.7893 9.46958 11 10 11Z" />
                            </svg>

                            <p class="text-neutral-50 primary-medium">850 Madison Ave, Suite 205, New York, NY 10021</p>
                        </div>

                        <button class="flex items-center justify-center gap-x-3 bg-accent-500 hover:bg-accent-300 px-6 py-1.5 rounded-full cursor-pointer">
                            <div>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-neutral-950" d="M2 3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H5.153C5.38971 2.00011 5.6187 2.08418 5.79924 2.23726C5.97979 2.39034 6.10018 2.6025 6.139 2.836L6.879 7.271C6.91436 7.48222 6.88097 7.69921 6.78376 7.89003C6.68655 8.08085 6.53065 8.23543 6.339 8.331L4.791 9.104C5.34611 10.4797 6.17283 11.7293 7.22178 12.7782C8.27072 13.8272 9.52035 14.6539 10.896 15.209L11.67 13.661C11.7655 13.4695 11.9199 13.3138 12.1106 13.2166C12.3012 13.1194 12.5179 13.0859 12.729 13.121L17.164 13.861C17.3975 13.8998 17.6097 14.0202 17.7627 14.2008C17.9158 14.3813 17.9999 14.6103 18 14.847V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H15C7.82 18 2 12.18 2 5V3Z" />
                                </svg>
                            </div>
                            <span class="text-neutral-950 primary-medium">(555) 123-4567</span>
                        </button>
                    </div>

                    <!-- links -->


                    <div class="flex space-x-4 mt-3 pb-2 !font-primary main-navigation-lg" id="main-navigation">

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>


</nav>





<!-- Mobile menu, show/hide based on menu state. -->
<div class="lg:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Home</a>
        <a href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About Us</a>
        <a href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Services</a>
        <a href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Patient Education</a>
        <a href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reviews</a>
        <a href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact Us</a>
    </div>
</div>


<?php
get_footer();
?>
