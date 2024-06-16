<?php
// فانکشنی که پارامتر هارو میگیره و کتاب ها رو توی صفحه نشون میده
function show_book ($condition, $result) {
    if ($condition) {
        // تبدیل دیتای رسیده از دیتابیس به یک آرایه
        $row = $result -> fetch_assoc();
        // مقداری که از دیتابیس میاد به این صورته => همه,داستان,روانشناسی که با استفاده از explode تبدیلش کردم به یک آرایه
        $categories = explode(",", $row['categories']);
        
        // تبدیل عدد به فرمت معمول, مثال = 100000 => 10,000
        $price = number_format($row['price']);  

        // چاپ کردن کتاب های رسیده از دیتابیس
        echo "
            <section class='book'>
                <a class='download' href=".$row['download_link'].">
                    <svg viewBox='0 0 24.00 24.00' fill='none' width='60px' height='60px' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff' stroke-width='0.00024000000000000003' transform='matrix(1, 0, 0, 1, 0, 0)'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M5.625 15C5.625 14.5858 5.28921 14.25 4.875 14.25C4.46079 14.25 4.125 14.5858 4.125 15H5.625ZM4.875 16H4.125H4.875ZM19.275 15C19.275 14.5858 18.9392 14.25 18.525 14.25C18.1108 14.25 17.775 14.5858 17.775 15H19.275ZM11.1086 15.5387C10.8539 15.8653 10.9121 16.3366 11.2387 16.5914C11.5653 16.8461 12.0366 16.7879 12.2914 16.4613L11.1086 15.5387ZM16.1914 11.4613C16.4461 11.1347 16.3879 10.6634 16.0613 10.4086C15.7347 10.1539 15.2634 10.2121 15.0086 10.5387L16.1914 11.4613ZM11.1086 16.4613C11.3634 16.7879 11.8347 16.8461 12.1613 16.5914C12.4879 16.3366 12.5461 15.8653 12.2914 15.5387L11.1086 16.4613ZM8.39138 10.5387C8.13662 10.2121 7.66533 10.1539 7.33873 10.4086C7.01212 10.6634 6.95387 11.1347 7.20862 11.4613L8.39138 10.5387ZM10.95 16C10.95 16.4142 11.2858 16.75 11.7 16.75C12.1142 16.75 12.45 16.4142 12.45 16H10.95ZM12.45 5C12.45 4.58579 12.1142 4.25 11.7 4.25C11.2858 4.25 10.95 4.58579 10.95 5H12.45ZM4.125 15V16H5.625V15H4.125ZM4.125 16C4.125 18.0531 5.75257 19.75 7.8 19.75V18.25C6.61657 18.25 5.625 17.2607 5.625 16H4.125ZM7.8 19.75H15.6V18.25H7.8V19.75ZM15.6 19.75C17.6474 19.75 19.275 18.0531 19.275 16H17.775C17.775 17.2607 16.7834 18.25 15.6 18.25V19.75ZM19.275 16V15H17.775V16H19.275ZM12.2914 16.4613L16.1914 11.4613L15.0086 10.5387L11.1086 15.5387L12.2914 16.4613ZM12.2914 15.5387L8.39138 10.5387L7.20862 11.4613L11.1086 16.4613L12.2914 15.5387ZM12.45 16V5H10.95V16H12.45Z' fill='#ffffff'></path></g></svg>

                    <h4>دانلود کتاب</h4>
                </a>

                <div class='info'>
                    <div class='cover'>
                        <img src='".$row['cover']."' alt='".$row['title']."'>
                    </div>

                    <div class='about'>
                        <h2>".$row['title']."</h2>
                        <div class='row'>  
                            <h4>اثری از ".$row['author']."</h4>
                            <div class='price'>
                                قیمت : <s>".$price."</s>
                                <p>رایگان</p>
                            </div>
                        </div>
                        <div class='categories'";

                            foreach ($categories as $category) echo "<p>#".$category."</p>";

        echo "
                        </div>

                        <p class='lg-description'>
                            ".$row['description']."
                        </p>
                    </div>
                </div>

                <div class='sm-description'>
                    <p>".$row['description']."
                </div>
            </section>
        ";
    } else {
        // اگر مقداری از دیتابیس برگشت داده نشده بود
        echo "<h3 style='color: red; margin-block: 1rem;'>هیچ کتابی با مشخصه مورد نظر پیدا نشد !</h3>";
    }
}
?>