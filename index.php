<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPSearchX</title>

    <!-- linking of enternal module and scripts-->
    <link rel="stylesheet" href="./style.css">
    <script src="main.js"></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icon/favicon-16x16.png">
    <link rel="shortcut icon" href="./icon/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="./icon/site.webmanifest">
</head>

<style>
/* Add your existing CSS here */
@media only screen and (max-width: 800px) {
    .main {
        width: 100%;
    }
}

/* Media Queries */
@media only screen and (max-width: 480px) {
    .main {
        width: 100%;
        font-family: arial;
    }

    .search_bar input {
        width: calc(100% - 100px);
        font-family: 'Courier New', Courier, monospace;
        padding: 5px;
    }

    .search_bar button {
        width: 100px;
    }

    .items {
        width: 100%;
        margin: 0px;
        margin-bottom: 5px;
    }

    .top img {
        height: 30px;
        width: 30px;
        margin: 0px;
        margin-right: 5px;
        margin-left: 5px;
        margin-top: 5px;
        padding: 0px;
    }

    .top {
        margin: 0px;
        padding: 0px;
        margin-top: 6px;
    }

    .footer {
        width: 100%;
        height: auto;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .showpage {
        height: auto;
        width: 100%;
        background-color: #40810240;
        display: flex;
        flex-direction: row;
        text-align: center;
        justify-content: center;
        align-items: center;
    }

    .showpage a {
        height: auto;
        width: auto;
        margin: 0px;
        padding: 10px;
    }

    .showpage a:hover {
        background-color: #40810240;
    }

    .showpage .active {
        border-bottom: 2px solid blue;
    }
}
.load_more{
    height: auto;
    width: 90%;
    border: 1px solid white;
    font-family: cursive;
    box-shadow: 0px 0px 4px gray;
    padding: 5px;
    margin: 0px;
    align-self:center;
}

.load_more:hover{
    box-shadow: 0px 0px 10px gray;
}
</style>

<body>
    <div class="main">
        <div class="header">
            <h2>CPSearchX</h2>
            <!-- Search Form -->
            <form id="searchForm" class="search_bar">
                <input type="text" id="query" name="q" placeholder="Search the world">
                <button type="submit">Search</button>
            </form>
            <div class="filter">
                <!-- Filter options go here -->
            </div>
        </div>
        <div id="item_list" class="body">
            <!-- Search results will be appended here -->
        </div>
        <div class="footer">
            <!-- Pagination Links -->
            <button style="display:none" class='load_more' id='load_more' type='submit'>Load More..</button>
            <!-- About Section -->
            <div class="about">
                <h2>About</h2>
                <p>This is a Search Engine which searches user query. Built by an undergraduate student overnight.</p>
                <p>By the way you can follow me on github: <a href="https://github.com/h4jack"><strong>h4jack<strong></p>
            </div>
        </div>
    </div>

    <script>
    const urlParams = new URLSearchParams(window.location.search);
    let start = urlParams.get('start');
    start = start && start < 100 && start > 0 ? start : 1;
    const query = urlParams.get('q');
    
    document.getElementById('load_more').onclick = function() {
        // alert("hello"); // just to test if this function is working or not...
        if (query) {
            start += start == 100 ? 0 : 10;
            fetchResults(query, start);
            window.history.pushState({}, '', `?q=${encodeURIComponent(query)}`);
        }
    };

    
    window.onload = function () {
        if (query) {
            document.getElementById('query').value = query;
            if(start){
                fetchResults(query, start);
            }else{
                fetchResults(query);
            }
        }else{
            const itemList = document.getElementById('item_list');
            itemList.innerHTML = `
            <h3 class='title'>
                Welcome to the CPSearchX
            </h3>
            <p>don't know.<br>
            try this search
                <a href='?q=best food for morning'>
                    <strong>best food for morning</strong>
                </a>`;
        }
    };
    </script>
</body>

</html>
