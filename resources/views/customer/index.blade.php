<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('customer_css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer_css/all.css')}}">
</head>
<body>
<nav>
    <div class="brand">
        <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo">
    </div>
    <div class="nav-menu">
        <ul class="nav-list">
            <li>Beer / Sake</li>
            <li>Wine / Soft Drinks </li>
            <li>SPECIALS!!</li>
            <li>Summer Specials</li>
            <li>Nibbles / Salad</li>
            <li class="collapsed"> Main Dishes
                <ul class="Dashlisted">
                    <li>Grilled</li>
                    <li class="active">Deep-fried</li>
                    <li>Seafood</li>
                    <li>Tempura</li>
                </ul>
            </li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
            <li>Hot Pot</li>
            <li>Rice Dish</li>
            <li>Desserts</li>
        </ul>
    </div>
</nav>
<main>
    <header>
        <div class="tInfo btn">
            <div class="tNumber">
                <h3>Table Number</h3>
                <h2>005 + 006 + 008</h2>
            </div><br>
            <div class="tTime">
                <h3>Start time</h3>
                <h2>18:30 14 APR 2018</h2>
            </div>
        </div>
        <div>
            <img src="{{asset('img/call_staff.png')}}" alt="staff" srcset="" width="90px">
            <h2>Call Staff</h2>
        </div>
        <div>
            <img src="{{asset('img/language.png')}}" alt="language" srcset="" width="90px">
            <h2>语言</h2>
        </div>
        <div>
            <img src="{{asset('img/feedback.png')}}" alt="feedback" srcset="" width="90px">
            <h2>Feedback</h2>
        </div>
        <div class="primaryBtn btn" id="myBtn">
            <img src="{{asset('img/money.png')}}" alt="" srcset="" width="50px">
            <h1>View Bill & Pay</h1>
        </div>
        <div class="greyBtn btn">
            <h2>Last order in</h2>
            <h1>15 mins</h1>
        </div>
    </header>
    <section>
        <div class="card">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" alt="" srcset="" style="position: absolute;">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" width="20px" alt="" srcset="">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>
        <div class="card outStock">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" width="20px" alt="" srcset="">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" width="20px" alt="" srcset="">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" width="20px" alt="" srcset="">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>
        <div class="card outStock">
            <div class="card-header">
                <img class="cardImg" src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
                <div class="headerSpan">
                    <div class="specialBadge">
                        <img src="{{asset('img/Special.png')}}" width="20px" alt="" srcset="">
                    </div>
                    <div class="fab">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <p>Chicken Katsu (Schnitzel) + Japanese BBQ Sauce + Daikon Oroshi</p>
                <footer>
                    <div class="discountedPrice">$8.50</div>
                    <div class="price striked">$10.50</div>
                </footer>
            </div>
        </div>

    </section>
</main>
<script>
    let navMenuList = document.querySelector('.nav-list').children;

    function main() {
        activate()
        for (let i = 0; i < navMenuList.length; i++) {
            navMenuList[i].addEventListener('click', function (e) {
                activate();
                if (e.target.classList.contains('collapsed')) {
                    e.target.classList.remove('collapsed');
                    e.target.classList.add('expanded');
                }
                else if (e.target.classList.contains('expanded')) {
                    e.target.classList.add('collapsed');
                    e.target.classList.remove('expanded');
                    activate();
                    return;
                }
                e.target.classList.add('active');
            })
        }
    }

    function collapseAll() {
        let collapsedItems = document.querySelector('.expanded');

        collapsedItems.classList.remove('expanded');
        collapsedItems.classList.add('collapsed');

    }

    main();
    function activate() {
        let activeElements = document.querySelectorAll('.active');
        activeElements.forEach(element => {
            element.classList.remove('active');
    })
    }

</script>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modalHeader">
            <h3>Salmon & Avocado roll sushi with Ikura 6pc</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus.</p>
            <div class="modalPriceOffer" style="display:inline-flex;">
                <div class="discountedPrice" style="padding-right:10px;">$8.50</div>
                <div class="price striked">$10.50</div>
            </div>
        </div>
        <div class="modalContent">
            <div class="leftContent">
                <div class="specialBadge">
                    <img src="{{asset('img/Special.png')}}" alt="" srcset="" style="position: absolute;">
                </div>
                <img src="http://images.media-allrecipes.com/userphotos/960x960/4027930.jpg" alt="chicken">
            </div>
            <div class="rightContent">
                <div class="contentHeader">
                    Please choose:
                </div>
                <div class="scrollable menu">
                    <div class="menuClasses">
                        <div class="menuClassesHeader">Sauce</div>
                        <label class="container">One
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Two
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Three
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Four
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="menuClasses">
                        <div class="menuClassesHeader">Sauce</div>
                        <label class="container">One
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Two
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Three
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Four
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="menuClasses">
                        <div class="menuClassesHeader">Sauce</div>
                        <label class="container">One
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Two
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Three
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Four
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="modalContent noMargin">
            <div>
                <p class="prepareStatus">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, dolorem!</p>
            </div>
            <div class="padding10">
                <div class="btnGroup">
                    <button id="minus">
                        <i class="far fa-minus"></i>
                    </button>
                        <span id="numOfItems">
                            00
                        </span>
                    <button id="plus">
                        <i class="far fa-plus"></i>
                    </button>
                </div>
                <button class="cta">Order now</button>
            </div>
        </div>
    </div>
</div>
<script>
    let nums = 0;
    const numOfItems = document.querySelector('#numOfItems');
    const minus = document.querySelector('#minus');
    const plus = document.querySelector('#plus');
    numOfItems.textContent = nums;
    minus.onclick = () => { if (nums > 0) { nums--; numOfItems.textContent = nums; } };
    plus.onclick = () => { nums++; numOfItems.textContent = nums; };

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.querySelectorAll(".fab");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.forEach(element => {
        element.onclick = function () {
        modal.style.display = "block";
    }
    })

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
</body>

</html>