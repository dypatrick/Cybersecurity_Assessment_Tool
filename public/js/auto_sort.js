/* Adds in a text-sorter for any tables on a page                                  */
/* Will skip sorts on blank <th> entries                                           */
/* Does not work with paginated tables or multiple tables                          */
/* Adding class="auto-sort-none" to <TH> will skip that column                     */
/* Adding class="auto-sort-default" to <TH> will sort that column by default (asc) */
/* Tables must follow the following format:                                        */
/*
    <table class="auto-sort">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
////////////////////////////////////////////////////
<script src="{{ asset('/js/auto_sort.js') }}"></script>
*/
$(document).ready(function() {
    //Get all page tables
    tables = $(".auto-sort");
    //Get all header names
    columnNames = []
    columns = tables.find('thead tr:first th').each(function() {
        thisColumn = $(this).text().replace(/[\s!@#$%^&*(),.?":{}|<>]/g, '');
        columnNames.push(thisColumn);
        //Ignore empty headers
        if (thisColumn != '' && !$(this).hasClass('auto-sort-none')) {
            $(this).append(`
                &nbsp;<button class="btn btn-sm btn-outline-primary ` + thisColumn + `Btn" type="button" title="Not Sorted" onclick="autoSort('` + thisColumn + `', 'none');"><i class="fas fa-minus"></i></button>
            `);
        }
    });
    //Default sort
    defaultSort = $('.auto-sort-default');
    if (defaultSort) {
        autoSort(defaultSort.text().replace(/[\s!@#$%^&*(),.?":{}|<>]/g, ''), 'desc');
    }
});

function autoSort(column, type) {
    columnNumber = columnNames.indexOf(column) + 1;

    tables = $(".auto-sort");
    tbody = tables.find('tbody');
    //Desc/None -> Asc
    if (type == 'desc' || type == 'none') {
        //Sort Ascending
        tbody.find('tr').sort(function(a, b) {
            return $('td:nth-child(' + columnNumber + ')', a).text().localeCompare($('td:nth-child(' + columnNumber + ')', b).text());
        }).appendTo(tbody);
        //Set all other buttons to inactive and '-' icon
        buttons = columns.children();
        buttons.removeClass('active');
        buttons.attr("title", "Not Sorted");
        buttons.children().removeClass();
        buttons.children().addClass('fas fa-minus');

        //Change icon style and type
        button = $('.' + column + 'Btn');
        button.addClass('active');
        button.attr("title", "Ascending Sort");
        button.attr("onclick", "autoSort('" + column + "', 'asc')");
        button.children().removeClass();
        button.children().addClass('fas fa-arrow-up');
    }
    //Asc -> Desc
    if (type == 'asc') {
        //Sort Descending
        tbody.find('tr').sort(function(a, b) {
            return $('td:nth-child(' + columnNumber + ')', b).text().localeCompare($('td:nth-child(' + columnNumber + ')', a).text());
        }).appendTo(tbody);
        //Set all other buttons to inactive and '-' icon
        buttons = columns.children();
        buttons.removeClass('active');
        buttons.attr("title", "Not Sorted");
        buttons.children().removeClass();
        buttons.children().addClass('fas fa-minus');
        //Change icon style and type
        button = $('.' + column + 'Btn');
        button.addClass('active');
        button.attr("title", "Descending Sort");
        button.attr("onclick", "autoSort('" + column + "', 'desc')");
        button.children().removeClass();
        button.children().addClass('fas fa-arrow-down');
    }
}