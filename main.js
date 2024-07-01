document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const query = document.getElementById('query').value;
    if (query) {
        fetchResults(query);
        window.history.pushState({}, '', `?q=${encodeURIComponent(query)}`);
    }
});

function fetchResults(query, start = 1) {
    document.getElementById('loading').style.display = "block";
    fetch(`load.php?q=${encodeURIComponent(query)}&start=${start}`)
    .then(response => response.json())
    .then(data => displayResults(data))
    .catch(error => console.error('Error:', error));
    document.title = `${query} - CPSearchX`;
}

function displayResults(data) {
    const itemList = document.getElementById('item_list');
    // itemList.innerHTML = '';
    document.getElementById('loading').style.display = "none";
    
    if (data.items) {
        data.items.forEach(item => {
            const title = item.title || '<i>no heading for that one</i>';
            const link = item.link || '<i>No link</i>';
            const snippet = item.snippet || '<i>No more details</i>';
            const parsedUrl = new URL(link);
            const domain = parsedUrl.hostname || 'No domain';
            const formattedUrl = link.length > 40 ? link.substring(0, 30) + "..." : link;
            const faviconUrl = `https://${domain}/favicon.ico`;

            const favicon = new Image();
            favicon.src = faviconUrl;
            favicon.onerror = () => { favicon.src = './testfav.ico'; };

            const itemHTML = `
                <div class='items'>
                    <div class='top'>
                        <img src='${favicon.src}' width='40px' height='40px' alt='favicon'>
                        <a href='${link}' class='link'>
                            <p class='domain'>${domain}</p>
                            <p class='url'>${formattedUrl}</p>
                        </a>
                    </div>
                    <h3 class='title'><a href='${link}'>${title}</a></h3>
                    <p class='description'>${snippet}</p>
                </div>`;
            itemList.innerHTML += itemHTML;
        });
        document.getElementById("load_more").style.display = "block";
    } else if (data.error) {
        itemList.innerHTML = `<div class='items'><h3 class='title'><a href=''>Error: ${data.error}</a></h3></div>`;
    } else {
        itemList.innerHTML = `<div class='items'><h3 class='title'><a href=''>No Result for: <strong>${document.getElementById('query').value}</strong></a></h3></div>`;
    }
}