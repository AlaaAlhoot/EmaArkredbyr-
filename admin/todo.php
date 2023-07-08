<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Todo Tasks</title>
    <link rel="icon" type="png/jpg" href="../assets/images/logo.png">

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->

    <!--Calender-->
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!--End Calender-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push" id="body-dash">

    <style>
    #preloader {
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 1000;
        background: #e3f4fd url(../assets/images/load.gif) no-repeat center;
        background-size: 30%;
    }
    </style>

    <script>
    var loader = document.getElementById('preloader');

    window.addEventListener('load', function() {

        loader.style.display = "none";


    });
    </script>
    <div class="main-content">

        <?php include_once 'includes/sidebar.php';?>

        <?php include_once 'includes/header.php';?>
        <!-- main content start-->
        <div id="page-wrapper" class="row calender ">
            <div class="main-page">







                <!-- App Wrapper -->
                <main class="app">
                    <!-- Greeting -->
                    <section class="greeting">
                        <h2 class="title">
                            To Do Tasks <input style="display: none" type=" text" id="name" placeholder="Name here" />
                        </h2>
                    </section>
                    <!-- End of Greeting -->

                    <!-- New Todo -->
                    <section class="create-todo">
                        <!-- <h3>CREATE A TODO</h3> -->
                        <form id="new-todo-form">
                            <!-- <h4>What's on your todo?</h4> -->
                            <input type="text" placeholder="Add New Task ..." name="content" id="content" />

                            <!-- <h4>Pick a category</h4> -->
                            <div class="options">
                                <label>
                                    <input type="radio" name="category" id="category1" value="business" />
                                    <span class="bubble business"></span>
                                    <div>Business</div>
                                </label>
                                <label>
                                    <input type="radio" name="category" id="category2" value="personal" />
                                    <span class="bubble personal"></span>
                                    <div>Personal</div>
                                </label>
                            </div>

                            <input type="submit" value="Add todo" />
                        </form>
                    </section>
                    <!-- End of New Todo -->

                    <!-- Todo List -->
                    <section class="todo-list">
                        <h3>TODO LIST</h3>
                        <div class="list" id="todo-list"></div>
                    </section>
                    <!-- End of Todo List -->

                </main>
                <!-- End of App Wrapper -->



                <style>
                /* Variables */
                :root {
                    --primary: #aed96a;
                    --business: #3a82ee;
                    --personal: var(--primary);
                    --light: #EEE;
                    --grey: #888;
                    --dark: #313154;
                    --danger: #ff5b57;

                    --shadow: 0 1px 3px rgba(0, 0, 0, 0.1);

                    --business-glow: 0px 0px 4px rgba(58, 130, 238, 0.75);
                    /* --personal-glow: 0px 0px 4px rgba(234, 64, 164, 0.75); */
                }

                /* End of Variables */

                /* Resets */
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'montserrat', sans-serif;
                }

                input:not([type="radio"]):not([type="checkbox"]),
                button {
                    appearance: none;
                    border: none;
                    outline: none;
                    background: none;
                    cursor: initial;
                }

                /* End of Resets */

                body {
                    background: var(--light);
                    color: var(--dark);
                }

                section {
                    margin-top: 2rem;
                    margin-bottom: 2rem;
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }

                h3 {
                    color: var(--dark);
                    font-size: 1rem;
                    font-weight: 400;
                    margin-bottom: 0.5rem;
                }

                h4 {
                    color: var(--grey);
                    font-size: 0.875rem;
                    font-weight: 700;
                    margin-bottom: 0.5rem;
                }

                .greeting .title {
                    display: flex;
                }

                .greeting .title input {
                    margin-left: 0.5rem;
                    flex: 1 1 0%;
                    min-width: 0;
                }

                .greeting .title,
                .greeting .title input {
                    color: var(--dark);
                    font-size: 1.5rem;
                    font-weight: 700;
                }

                .create-todo input[type="text"] {
                    display: block;
                    width: 100%;
                    font-size: 1.125rem;
                    padding: 1rem 1.5rem;
                    color: var(--dark);
                    background-color: #FFF;
                    border-radius: 0.5rem;
                    box-shadow: var(--shadow);
                    margin-bottom: 1.5rem;
                }

                .create-todo .options {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 1rem;
                    margin-bottom: 1.5rem;
                }

                .create-todo .options label {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    background-color: #FFF;
                    padding: 1.5rem;
                    box-shadow: var(--shadow);
                    border-radius: 0.5rem;
                    cursor: pointer;
                }

                input[type="radio"],
                input[type="checkbox"] {
                    display: none;
                }

                .bubble {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 20px;
                    height: 20px;
                    border-radius: 999px;
                    border: 2px solid var(--business);
                    box-shadow: var(--business-glow);
                }

                .bubble.personal {
                    border-color: var(--personal);
                    box-shadow: var(--personal-glow);
                }

                .bubble::after {
                    content: '';
                    display: block;
                    opacity: 0;
                    width: 0px;
                    height: 0px;
                    background-color: var(--business);
                    box-shadow: var(--business-glow);
                    border-radius: 999px;
                    transition: 0.2s ease-in-out;
                }

                .bubble.personal::after {
                    background-color: var(--personal);
                    box-shadow: var(--personal-glow);
                }

                input:checked~.bubble::after {
                    width: 10px;
                    height: 10px;
                    opacity: 1;
                }

                .create-todo .options label div {
                    color: var(--dark);
                    font-size: 1.125rem;
                    margin-top: 1rem;
                }

                .create-todo input[type="submit"] {
                    display: block;
                    width: 100%;
                    font-size: 1.125rem;
                    padding: 1rem 1.5rem;
                    color: #FFF;
                    font-weight: 700;
                    text-transform: uppercase;
                    background-color: var(--primary);
                    box-shadow: var(--personal-glow);
                    border-radius: 0.5rem;
                    cursor: pointer;
                    transition: 0.2s ease-out;
                }

                .create-todo input[type="submit"]:hover {
                    opacity: 0.75;
                }

                .todo-list .list {
                    margin: 1rem 0;
                }

                .todo-list .todo-item {
                    display: flex;
                    align-items: center;
                    background-color: #FFF;
                    padding: 1rem;
                    border-radius: 0.5rem;
                    box-shadow: var(--shadow);
                    margin-bottom: 1rem;
                }

                .todo-item label {
                    display: block;
                    margin-right: 1rem;
                    cursor: pointer;
                }

                .todo-item .todo-content {
                    flex: 1 1 0%;
                }

                .todo-item .todo-content input {
                    color: var(--dark);
                    font-size: 1.125rem;
                }

                .todo-item .actions {
                    display: flex;
                    align-items: center;
                }

                .todo-item .actions button {
                    display: block;
                    padding: 0.5rem;
                    border-radius: 0.25rem;
                    color: #FFF;
                    cursor: pointer;
                    transition: 0.2s ease-in-out;
                }

                .todo-item .actions button:hover {
                    opacity: 0.75;
                }

                .todo-item .actions .edit {
                    margin-right: 0.5rem;
                    background-color: var(--primary);
                }

                .todo-item .actions .delete {
                    background-color: var(--danger);
                }

                .todo-item.done .todo-content input {
                    text-decoration: line-through;
                    color: var(--grey);
                }
                </style>



                <script>
                window.addEventListener('load', () => {
                    todos = JSON.parse(localStorage.getItem('todos')) || [];
                    const nameInput = document.querySelector('#name');
                    const newTodoForm = document.querySelector('#new-todo-form');

                    const username = localStorage.getItem('username') || '';

                    nameInput.value = username;

                    nameInput.addEventListener('change', (e) => {
                        localStorage.setItem('username', e.target.value);
                    })

                    newTodoForm.addEventListener('submit', e => {
                        e.preventDefault();

                        const todo = {
                            content: e.target.elements.content.value,
                            category: e.target.elements.category.value,
                            done: false,
                            createdAt: new Date().getTime()
                        }

                        todos.push(todo);

                        localStorage.setItem('todos', JSON.stringify(todos));

                        // Reset the form
                        e.target.reset();

                        DisplayTodos()
                    })

                    DisplayTodos()
                })

                function DisplayTodos() {
                    const todoList = document.querySelector('#todo-list');
                    todoList.innerHTML = "";

                    todos.forEach(todo => {
                        const todoItem = document.createElement('div');
                        todoItem.classList.add('todo-item');

                        const label = document.createElement('label');
                        const input = document.createElement('input');
                        const span = document.createElement('span');
                        const content = document.createElement('div');
                        const actions = document.createElement('div');
                        const edit = document.createElement('button');
                        const deleteButton = document.createElement('button');

                        input.type = 'checkbox';
                        input.checked = todo.done;
                        span.classList.add('bubble');
                        if (todo.category == 'personal') {
                            span.classList.add('personal');
                        } else {
                            span.classList.add('business');
                        }
                        content.classList.add('todo-content');
                        actions.classList.add('actions');
                        edit.classList.add('edit');
                        deleteButton.classList.add('delete');

                        content.innerHTML = `<input type="text" value="${todo.content}" readonly>`;
                        edit.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>';
                        deleteButton.innerHTML = '<i class="fa fa-trash-o" aria-hidden="true"></i>';

                        label.appendChild(input);
                        label.appendChild(span);
                        actions.appendChild(edit);
                        actions.appendChild(deleteButton);
                        todoItem.appendChild(label);
                        todoItem.appendChild(content);
                        todoItem.appendChild(actions);

                        todoList.appendChild(todoItem);

                        if (todo.done) {
                            todoItem.classList.add('done');
                        }

                        input.addEventListener('change', (e) => {
                            todo.done = e.target.checked;
                            localStorage.setItem('todos', JSON.stringify(todos));

                            if (todo.done) {
                                todoItem.classList.add('done');
                            } else {
                                todoItem.classList.remove('done');
                            }

                            DisplayTodos()

                        })

                        edit.addEventListener('click', (e) => {
                            const input = content.querySelector('input');
                            input.removeAttribute('readonly');
                            input.focus();
                            input.addEventListener('blur', (e) => {
                                input.setAttribute('readonly', true);
                                todo.content = e.target.value;
                                localStorage.setItem('todos', JSON.stringify(todos));
                                DisplayTodos()

                            })
                        })

                        deleteButton.addEventListener('click', (e) => {
                            todos = todos.filter(t => t != todo);
                            localStorage.setItem('todos', JSON.stringify(todos));
                            DisplayTodos()
                        })

                    })
                }
                </script>






            </div>
        </div>

        <style>
        #body-dash {
            height: 100vh;

        }
        </style>
        <!--footer-->
        <?php include_once 'includes/footer.php';?>
        <!--//footer-->
    </div>
    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };


    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
    </script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>