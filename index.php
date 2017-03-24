<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODOList</title>
    <link rel="stylesheet" href="css/material.min.css">
    <script src="js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">TODO List</span>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content">
            <table class="mdl-data-table mdl-js-data-table">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Nickname</th>
                    <th>Age</th>
                    <th class="mdl-data-table__cell--non-numeric">Living?</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">John Lennon</td>
                    <td class="mdl-data-table__cell--non-numeric">The smart one</td>
                    <td>40</td>
                    <td class="mdl-data-table__cell--non-numeric">No</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Paul McCartney</td>
                    <td class="mdl-data-table__cell--non-numeric">The cute one</td>
                    <td>73</td>
                    <td class="mdl-data-table__cell--non-numeric">Yes</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">George Harrison</td>
                    <td class="mdl-data-table__cell--non-numeric">The shy one</td>
                    <td>58</td>
                    <td class="mdl-data-table__cell--non-numeric">No</td>
                </tr>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">Ringo Starr</td>
                    <td class="mdl-data-table__cell--non-numeric">The funny one</td>
                    <td>74</td>
                    <td class="mdl-data-table__cell--non-numeric">Yes</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>