# CPSearchX

CPSearchX is a simple search engine web application that allows users to search the web using the Google Custom Search API. It provides search results in a user-friendly interface with pagination and basic styling.

## Preview
To preview CPSearchX, you can visit the live demo [here](https://myloginphp.rf.gd/cpsearchx).

## Table of Contents

*   [Features](#features)
*   [Technologies Used](#technologies-used)
*   [Files and Structure](#files-and-structure)
*   [Setup Instructions](#setup-instructions)
*   [Usage](#usage)
*   [About](#about)

## Features

*   **Search Bar**: Allows users to input search queries.
*   **Search Results**: Displays search results including title, link, and snippet.
*   **Pagination**: Enables loading more results dynamically.
*   **Responsive Design**: Supports different screen sizes.

## Technologies Used

*   **Frontend**: HTML, CSS, JavaScript
*   **Backend**: PHP
*   **API**: Google Custom Search API

## Files and Structure

*   **index.php**: Main HTML and PHP file handling frontend and backend logic.
*   **load.php**: PHP script handling AJAX requests to fetch search results.
*   **main.js**: JavaScript file for dynamic interaction and AJAX handling.
*   **style.css**: CSS file for styling the interface.

## Setup Instructions

1.  Clone the repository:
```bash
git clone https://github.com/h4jack/cpsearchx.git
```

2.  Configure your web server (e.g., Apache) to serve the files.

3.  Obtain a Google Custom Search API key and replace `$apiKey` and `$cx` in `load.php` with your own credentials.

4.  Access the application through your web browser.
    

## Usage

1.  Enter a search query in the provided search bar.
2.  Click on the "Search" button or press Enter to fetch results.
3.  Scroll through the results and click on links to visit the corresponding websites.
4.  Use pagination to load more search results.

## About

This project was developed as a learning exercise to implement AJAX-based search functionality using PHP and JavaScript.

- - -


## Authors

- [@h4jack](https://www.github.com/h4jack)


## License

This project is licensed under the [MIT License](https://github.com/h4jack/rpscmd/blob/main/LICENSE/)


## Feedback

If you have any feedback or suggestions, please feel free to [create an issue](https://github.com/h4jack/cpsearchx/issues) or [contact us](https://github.com/h4jack).